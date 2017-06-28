<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 6/27/2017
 * Time: 1:10 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RepComment extends Model
{
    protected $table = "rep_comments";
    protected $fillable = [
        'content',
        'user_id',
        'comment_id',
    ];

    /**
     * A comment belongs to review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}