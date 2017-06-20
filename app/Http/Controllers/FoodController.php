<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 6/20/2017
 * Time: 3:51 PM
 */

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FoodRepositoryInterface;

class FoodController extends Controller
{
    protected $foodRepository;
    protected $categoryRepository;

    public function __construct(
        FoodRepositoryInterface $foodRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($id)
    {
          $food = $this->foodRepository->with(['comments'])->find($id);
          $category = $this->categoryRepository->find($food->category_id);
        if ($food->rate_count > 0) {
            $score = number_format($food->score / $food->rate_count, 2);
        } else {
            $score = 0;
        }
        $latest = $this->foodRepository->findLatest()->get();
        $sames = $category->foods()->get();
//        $likes = $this->userBookRepository->findLikeByBookId($book->id);
//        $sames = $this->bookRepository->theSameCategory($id, $book->category_id)
//            ->paginate(config('settings.pagination.limit-sidebar'));
//
//        $value = 0;
//        if (!Auth::guest()) {
//            $rate = $this->userBookRepository->findRate($book->id, Auth::user()->id)->first();
//            if ($rate != null) {
//                $value = $rate->rate;
//            }
//        }

        return view('pages.food-details')->with(compact('food','score', 'latest', 'category', 'sames'));
    }
}