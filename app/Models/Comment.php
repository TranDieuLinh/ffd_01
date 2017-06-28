<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 5/8/2017
 * Time: 2:20 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'food_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function repComments()
    {
        return $this->hasMany(RepComment::class);
    }

    public function scopeDeleteById($query, $id)
    {
        $query->where('id', '=', $id)->get()->first()->repComments()->delete();
        $query->where('id', '=', $id)->delete();
    }
}
