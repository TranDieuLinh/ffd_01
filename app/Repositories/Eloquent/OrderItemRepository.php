<?php

namespace App\Repositories\Eloquent;

use App\Models\OrderItem;
use App\Repositories\Contracts\OrderItemRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Input;

class OrderItemRepository extends BaseRepository implements OrderItemRepositoryInterface
{
    public function model()
    {
        return OrderItem::class;
    }
}
