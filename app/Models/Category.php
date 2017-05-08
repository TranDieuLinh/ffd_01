<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 5/8/2017
 * Time: 2:18 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected  $fillable = [
      'name',
    ];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
