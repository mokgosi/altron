<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data, $model)
    {
        return $this->model->update($data);
    }
}