<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 5/8/2017
 * Time: 2:19 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';
    protected $fillable = [
        'user_id',
        'food_id',
        'point',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function scopeFindFoodRate($query, $food_id, $user_id)
    {
        return $query->where(['food_id' => $food_id, 'user_id' => $user_id]);
    }
}
