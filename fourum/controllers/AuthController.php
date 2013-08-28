<?php namespace Fourum\Controllers;

use Fourum\Storage\User\UserRepositoryInterface;

class AuthController extends BaseController
{
    private $users;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->users = $userRepository;
    }

    public function index()
    {
        var_dump($this->users->all());
    }
}
