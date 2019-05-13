<?php

namespace App\Repositories\Interfaces;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $attributes);
    public function update(array $attributes, $role);
    public function delete($id);
}