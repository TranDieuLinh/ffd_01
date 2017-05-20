<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\FoodRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Input;
use App\Models\Food;

class FoodRepository extends BaseRepository implements FoodRepositoryInterface
{
    public function model()
    {
        return Food::class;
    }

    /**
     * Get All food Paginate
     *
     * @return pagination
     */
    public function getAllFoodPaginate()
    {
        return $this->model->with('author')->paginate();
    }

    /**
     * Register food
     *
     * @param  array $request
     *
     * @return mixed
     */
    public function create(array $request)
    {
        if (!$this->model->create($this->dataRequest($request))) {
            return false;
        }

        return true;
    }

    /**
     * Update a food
     *
     * @param  array $request
     * @param  int $id
     *
     * @return bool
     */
    public function update(array $request, $id, $withSoftDeletes = false)
    {
        if ($this->model->find($id)->update($this->dataRequest($request, $id))) {
            return true;
        }

        return false;
    }

    /**
     * Delete list foods
     *
     * @param  array $ids
     *
     * @return bool
     */
    public function deleteAll(array $ids)
    {
        if (!$ids) {
            return false;
        }

        $this->model->whereIn('id', $ids)->get()->each(function ($food) {
            $food->delete();
        });

        return true;
    }

    /**
     * @return 15 latest foods
     */
    public function findLatest()
    {
        return $this->model->orderBy('date', 'desc')->get();
    }

    /**
     * @return all foods have advertise
     */
    public function findAdvertise()
    {
        return $this->model->where('advertise', '<>', NULL)->get();
    }

    /**
     * Create Comment For Review
     *
     * @param  array $input
     * @return bool
     */
    public function createComment($input)
    {
        if (!auth()->check()) {
            return false;
        }

        $data = [
            'user_id' => auth()->id,
            'content' => $input['content'],
        ];

        return $this->model->find($input['review_id'])->comments()->create($data);
    }

    public function searchFood($name)
    {
        return $this->model->where('name', 'like', '%' . $name . '%');
    }
}
