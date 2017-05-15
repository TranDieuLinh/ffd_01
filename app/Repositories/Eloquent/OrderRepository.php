<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Input;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function model()
    {
        return Order::class;
    }
}
