<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Cart;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $foodRepository;

    public function __construct(
        FoodRepositoryInterface $foodRepository
    )
    {
        $this->foodRepository = $foodRepository;
    }

    public function addToCart(Request $request)
    {
        $productId = $request->productId;
        $product = $this->foodRepository->find($productId);
        $quantity = $request->quantity;

        Cart::add("$product->id", "$product->name", $quantity, $product->prime, ['image' => "$product->image"]);

        return response()
            ->json([
                'count' => Cart::count(),
                'money' => Cart::subtotal(),
            ]);
    }

    public function deleteRow(Request $request)
    {
        $rowId = $request->row_id;
        Cart::remove($rowId);

        return response()
            ->json([
                'count' => Cart::count(),
                'money' => Cart::subtotal(),
            ]);
    }

    public function updateRow(Request $request)
    {
        $rowId = $request->row_id;
        $quantity = $request->quantity;
        Cart::update($rowId, $quantity);

        return response()
            ->json([
                'quantity'=> $quantity,
                'count' => Cart::count(),
                'money' => Cart::subtotal(),
            ]);
    }

    public function itemFood(Request $request)
    {
        $rows = Cart::content();

        return view('pages.cart-item-page', compact('rows'));
    }
}
