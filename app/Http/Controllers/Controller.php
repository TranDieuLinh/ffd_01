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
}
