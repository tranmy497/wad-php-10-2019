<?php

class User
{
    protected $name;
    protected $email;
    protected $password;
    protected $phone;
    protected $address;

    public function add()
    {
        echo 'add';
    }

    public function edit()
    {
        echo 'edit';
    }

    public function register()
    {
        echo 'register';
    }

    public function login()
    {
        echo 'login';
    }

    private function view()
    {
        echo 'view';
    }

    private function list()
    {
        echo 'list';
    }
}
