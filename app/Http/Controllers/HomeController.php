<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Http\Request;
use Cart;

class HomeController extends Controller
{
    protected $foodRepository;
    protected $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        FoodRepositoryInterface $foodRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 0;
        $advertiseFoods = $this->foodRepository->findAdvertise();
        $foods = $this->foodRepository->all();
        $categories = $this->categoryRepository->all();
        $title = trans('home.latest-foods');

        return view('welcome', compact('foods', 'advertiseFoods', 'title', 'count', 'categories'));
    }

    public function searchFood(Request $request)
    {
        $foods = $this->foodRepository->searchFood($request->search)->get();

        return view('pages.search-food', compact('foods'));
    }
}
