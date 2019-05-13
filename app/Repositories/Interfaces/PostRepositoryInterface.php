<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $attributes);
    public function update(array $attributes, $post);
    public function delete($id);
}