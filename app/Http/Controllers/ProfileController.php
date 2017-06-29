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
use Illuminate\Http\Request;

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

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            switch ($request->type) {
                case 1:
                    $user->name = $request->edit_content;
                    $user->save();
                    break;
                case 2:
                    $user->phone = $request->edit_content;
                    $user->save();
                    break;
                case 3:
                    $user->address = $request->edit_content;
                    $user->save();
                    break;
            }


        }
    }
}
