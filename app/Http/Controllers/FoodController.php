<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 6/20/2017
 * Time: 3:51 PM
 */

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\RepComment;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Http\Request;
use Auth;
use Cart;

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

        return view('pages.food-details')->with(compact('food', 'score', 'latest', 'category', 'sames', 'comments'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->productId;
        $product = $this->foodRepository->find($productId);
        $quantity = $request->quantity;
        Cart::add("$product->id", "$product->name", $quantity, $product->prime);
//        Cart::add([
//            ['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price],
//            ['id' => '4832k', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => ['size' => 'large']]
//        ]);

        return response()
            ->json([
                'count' => Cart::count(),
                'money' => Cart::subtotal(),
            ]);
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

//    public function vote(Request $request)
//    {
//        $user_id = $request->user_id;
//        $book_id = $request->book_id;
//        $value = $request->value;
//        $rate = Rate::findBookRate($book_id, $user_id)->first();
//        $book = Book::find($book_id);
//        $flag = true;
//        if ($rate != null) {
//            DB::beginTransaction();
//            try {
//                $book->rate =$book->rate - $rate->point + $value;
//                $book->save();
//
//                $rate->point = $value;
//                $rate->save();
//
//                DB::commit();
//            } catch (\Exception $e) {
//                dump($e);
//                DB::rollBack();
//                $flag = false;
//            }
//        } else {
//            DB::beginTransaction();
//            try {
//                $rate = new Rate();
//                $rate->user_id = $user_id;
//                $rate->type_id = $book_id;
//                $rate->point = $value;
//                $rate->type = 1;
//                $rate->save();
//
//                $book->rate_count += 1;
//                $book->rate += $value;
//                $book->save();
//
//                DB::commit();
//            } catch (\Exception $e) {
//                DB::rollBack();
//                $flag = false;
//            }
//        }
//        if($book->rate_count >0)
//        {
//            $score = number_format($book->rate/$book->rate_count,2);
//        }else
//        {
//            $score = 0;
//        }
//
//        return response()
//            ->json([
//                'success' => $flag,
//                'score' => $score
//            ]);
//    }

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
}