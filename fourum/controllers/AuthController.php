<?php namespace Fourum\Controllers;

use Fourum\Storage\User\UserRepositoryInterface;

/**
 * Auth Controller
 *
 * Handles actions relating to authenticating a user.
 */
class AuthController extends BaseController
{
    /**
     * User Repository
     * @var UserRepositoryInterface
     */
    private $users;

    /**
     * Constructor
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->users = $userRepository;
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        var_dump($this->users->all());
    }
}
