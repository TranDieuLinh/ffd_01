<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 5/8/2017
 * Time: 2:21 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'requests';
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
