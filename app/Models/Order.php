<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 5/8/2017
 * Time: 2:23 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'address',
        'phone',
        'prime',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
