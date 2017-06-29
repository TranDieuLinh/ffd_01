<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 5/8/2017
 * Time: 1:58 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'prime',
        'rate',
        'rate_count',
        'content',
        'quantity',
        'date',
        'type',
        'like_count',
        'share_count',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
