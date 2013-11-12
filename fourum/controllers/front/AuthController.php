<?php namespace Fourum\Controllers\Front;

use Fourum\Storage\User\UserRepositoryInterface;
use Fourum\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

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
        parent::__construct();

        $this->users = $userRepository;
    }

    /**
     * @return View
     */
    public function getLogin()
    {
        return View::make('auth.login');
    }

    public function postLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        $credentials = array(
            'email' => $email,
            'password' => $password
        );

        if (Auth::attempt($credentials)) {
            return Redirect::to('admin');
        } else {
            $json = array(
                'authenticated' => false
            );

            return Response::json($json);
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('auth/login');
    }

    public function postLogout()
    {
        Auth::logout();

        return Redirect::to('auth/login');
    }
}
