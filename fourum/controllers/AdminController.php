<?php namespace Fourum\Controllers;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('admin.auth');
    }
}
