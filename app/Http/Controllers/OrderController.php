<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 6/30/2017
 * Time: 7:30 AM
 */

namespace App\Http\Controllers;

use Cart;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        $rows = Cart::content();
        $phone = null;
        $address = null;
        if ( !Auth::guest())
        {
            $user = Auth::user();
            $phone = $user->phone;
            $address = $user->address;
        }

        return view('order', compact('rows', 'phone', 'address'));
    }

    public function addOrder()
    {
        Cart::destroy();
        return response()
            ->json([
                'count' => Cart::count(),
                'money' => Cart::subtotal(),
            ]);
    }
}