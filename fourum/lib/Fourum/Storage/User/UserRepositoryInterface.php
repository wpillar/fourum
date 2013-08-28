<?php namespace Fourum\Storage\User;

interface UserRepositoryInterface
{
    public function all();

    public function get($id);

    public function create($input);
}
