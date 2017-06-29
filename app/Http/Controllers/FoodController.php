<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 6/20/2017
 * Time: 3:51 PM
 */

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Rate;
use App\Models\RepComment;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Http\Request;
use Auth;
use Cart;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    protected $foodRepository;
    protected $categoryRepository;

    public function __construct(
        FoodRepositoryInterface $foodRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($id)
    {
        $food = $this->foodRepository->with(['comments'])->find($id);
        $category = $this->categoryRepository->find($food->category_id);
        $comments = $food->comments()->with(['repComments', 'user'])->get();
        if ($food->rate_count > 0) {
            $score = number_format($food->rate / $food->rate_count, 2);
        } else {
            $score = 0;
        }
        $latest = $this->foodRepository->findLatest()->get();
        $sames = $category->foods()->get();
        $value = 0;
        $like = null;
        if( !Auth::guest() )
        {
            $rate = Rate::findFoodRate($food->id, Auth::user()->id)->first();
            if ($rate != null)
            {
                $value = $rate->point;
            }
            $like = Like::findLike($food->id, Auth::user()->id)->first();

        }

        return view('pages.food-details')->with(compact('food', 'score', 'latest', 'category', 'sames', 'comments', 'value', 'like'));
    }

    public function deleteRepComment(Request $request)
    {
        $rep_comment_id = $request->rep_comment_id;
        RepComment::destroy($rep_comment_id);
    }

    public function deleteComment(Request $request)
    {
        $comment_id = $request->comment_id;
        Comment::deleteById($comment_id);
    }

    public function vote(Request $request)
    {
        $user_id = $request->user_id;
        $food_id = $request->food_id;
        $value = $request->value;
        $rate = Rate::findFoodRate($food_id, $user_id)->first();
        $food = $this->foodRepository->find($food_id);

        $flag = true;
        if ($rate != null) {
            DB::beginTransaction();
            try {
                $food->rate =$food->rate - $rate->point + $value;
                $food->save();

                $rate->point = $value;
                $rate->save();

                DB::commit();
            } catch (\Exception $e) {
                dump($e);
                DB::rollBack();
                $flag = false;
            }
        } else {
            DB::beginTransaction();
            try {
                $rate = new Rate();
                $rate->user_id = $user_id;
                $rate->food_id = $food_id;
                $rate->point = $value;
                $rate->save();

                $food->rate_count += 1;
                $food->rate += $value;
                $food->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $flag = false;
            }
        }
        if($food->rate_count >0)
        {
            $score = number_format($food->rate/$food->rate_count,2);
        }else
        {
            $score = 0;
        }

        return response()
            ->json([
                'success' => $flag,
                'score' => $score
            ]);
    }

    public function repComment(Request $request)
    {
        $repComment = new RepComment();
        $repComment->user_id = Auth::user()->id;
        $repComment->comment_id = $request->comment_id;
        $repComment->content = $request->rep_comment_content;
        $repComment->save();

        return response()
            ->json([
                'rep_comment' => $repComment,
                'user' => $repComment->user()->get()->first()
            ]);
    }

    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->food_id = $request->food_id;
        $comment->content = $request->comment_content;
        $comment->save();

        return response()
            ->json([
                'comment' => $comment,
                'user' => $comment->user()->get()->first()
            ]);
    }

    public function editComment(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        if ($comment) {
            $comment->content = $request->comment_content;
            $comment->save();
        }
    }

    public function editRepComment(Request $request)
    {
        $repComment = RepComment::find($request->rep_comment_id);
        if ($repComment) {
            $repComment->content = $request->rep_comment_content;
            $repComment->save();
        }
    }

    public function unLike(Request $request)
    {
        $like = Like::findLike($request->food_id, $request->user_id)->first();
        $like_id = $like->id;
        Like::destroy($like_id);
        $food = $this->foodRepository->find($request->food_id);
        $like_count = count($food->likes()->get());
        return response()
            ->json([
                'like_count' => $like_count,
            ]);
    }

    public function like(Request $request)
    {
        $li = Like::findLike($request->food_id, $request->user_id)->first();
        DB::beginTransaction();
        $like = new Like();
        if (count($li) == 0){
            try {
            $like->user_id = $request->user_id;
            $like->food_id = $request->food_id;
            $like->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        $food = $this->foodRepository->find($request->food_id);
        $like_count = count($food->likes()->get());
        return response()
            ->json([
                'like_count' => $like_count,
            ]);
    }
}