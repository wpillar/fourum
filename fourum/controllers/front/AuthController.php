<?php namespace Fourum\Controllers\Front;

use Fourum\Storage\User\UserRepositoryInterface;
use Fourum\Controllers\FrontController;

/**
 * Auth Controller
 *
 * Handles actions relating to authenticating a user.
 */
class AuthController extends FrontController
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

    public function login()
    {
        echo 'front login';
    }
}
