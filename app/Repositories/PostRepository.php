<?php
namespace App\Repositories;

use App\Post;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected $model;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(Post $post)
    {
        parent:: __construct($post);
        // $this->model = $post;
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
    public function update(array $attributes, $post)
    {
        try {
            return $this->model->find($post->id)->update($attributes);
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