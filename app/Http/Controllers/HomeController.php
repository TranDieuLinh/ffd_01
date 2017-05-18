<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Http\Request;

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
        parent::__construct();
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
        $latestFoods = $this->foodRepository->findLatest();
        $title = trans('home.latest-foods');
        return view('home', compact('latestFoods', 'title', 'count'));
    }
}
