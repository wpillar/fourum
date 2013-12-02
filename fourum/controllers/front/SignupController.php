<?php

namespace Fourum\Controllers\Front;

use Fourum\Controllers\FrontController;
use Fourum\Storage\Setting\Manager;
use Fourum\Storage\User\UserRepositoryInterface;
use Fourum\Validation\ValidatorRegistry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class SignupController extends FrontController
{
    protected $users;

    public function __construct(UserRepositoryInterface $users, ValidatorRegistry $registry, Manager $settings)
    {
        parent::__construct($registry, $settings);

        $this->users = $users;
    }

    public function getRegister()
    {
        return View::make('signup.register');
    }

    public function postRegister()
    {
        $userValidation = array(
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        $userValidator = $this->getValidator('user');
        if (! $userValidator->validate($userValidation)) {
            return Redirect::back()->withInput()->withErrors($userValidator);
        }

        $user = $this->users->create($userValidation);

        Auth::login($user);

        return Redirect::to('/');
    }
}
