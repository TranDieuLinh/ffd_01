<?php

namespace App\Repositories\Eloquent;

use App\Models\Rate;
use App\Repositories\Contracts\RateRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Input;

class RateRepository extends BaseRepository implements RateRepositoryInterface
{
    public function model()
    {
        return Rate::class;
    }
}
