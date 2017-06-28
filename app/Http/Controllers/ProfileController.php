<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 6/9/2017
 * Time: 1:34 PM
 */

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userRepository->with(['likes'])->find(Auth::user()->id);
        return view('home', compact('user'));
    }
}
