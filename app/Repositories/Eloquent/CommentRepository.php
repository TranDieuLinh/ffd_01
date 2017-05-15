<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Input;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function model()
    {
        return Comment::class;
    }
}
