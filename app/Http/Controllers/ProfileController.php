<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 6/9/2017
 * Time: 1:34 PM
 */

namespace App\Http\Controllers;


class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
