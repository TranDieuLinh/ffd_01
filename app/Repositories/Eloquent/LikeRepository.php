<?php

namespace App\Repositories\Eloquent;

use App\Models\Like;
use App\Repositories\Contracts\LikeRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Input;

class LikeRepository extends BaseRepository implements LikeRepositoryInterface
{
    public function model()
    {
        return Like::class;
    }

    public function findLike($foodId, $userId)
    {
        return $this->model->where('review_id', $foodId)
            ->where('user_id', $userId);
    }
}
