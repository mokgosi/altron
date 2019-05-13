<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $attributes);
    public function update(array $attributes, $user);
    public function delete($id);
}