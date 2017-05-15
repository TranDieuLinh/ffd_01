<?php

namespace App\Repositories\Contracts;

interface LikeRepositoryInterface extends RepositoryInterface
{
    public function findLike($foodId, $userId);
}
