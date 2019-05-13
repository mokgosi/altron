<?php
namespace App\Repositories;

use Spatie\Permission\Models\Role;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(Role $role)
    {
        // $this->model = $role;
        parent:: __construct($role);
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
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->delete($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function update(array $attributes,$role)
    {
        try {
            return $this->model->find($role->id)->update($attributes);
        } catch (QueryException $e) {
            throw new \Exception($e);
        }
    }
}