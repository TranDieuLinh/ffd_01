<?php

namespace App\Repositories\Eloquent;

use App\Models\Request;
use App\Repositories\Contracts\RequestRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Input;

class RequestRepository extends BaseRepository implements RequestRepositoryInterface
{
    public function model()
    {
        return Request::class;
    }
}
