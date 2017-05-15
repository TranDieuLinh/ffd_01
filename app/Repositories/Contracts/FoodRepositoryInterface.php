<?php

namespace App\Repositories\Contracts;

interface FoodRepositoryInterface extends RepositoryInterface
{
    public function deleteAll(array $ids);
}
