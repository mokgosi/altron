<?php
namespace App\Repositories;

use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        try {
            return $this->model->create($attributes);
        } catch (QueryException $e) {
            throw new \Exception($e);
        }
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function update(array $attributes)
    {
        try {
            return $this->model->update($attributes);
        } catch (QueryException $e) {
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->delete($id);
    }
}