<?php


namespace app\models;


class User extends AppModal
{
    public $attrebutes = [
        'name' => '',
        'email' => '',
        'password' => '',
    ];

    public $rules = [

        'required' => [
            ['name'],
            ['email'],
            ['password']
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6]
        ],
    ];

    public function checkUnique()
    {
        $users = \R::findOne('users', 'email = ?',
            [$this->attrebutes['email']]);
        if ($users) {
            if ($users->email == $this->attrebutes['email']) {
                $this->errors['unique'][] = 'This email already exists';
            }
            return false;
        }
        return true;
    }

    public function checkAdmin()
    {
        if ($this->attrebutes['name'] === 'admin'){
            $this->errors['unique'][] = 'Admin is a reserved name';
            return false;
        }
        return true;
    }

    public function login()
    {
        $email = !empty(trim($_POST['email'])) ? trim($_POST['email']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;

        if ($email && $password) {
            $user = \R::findOne('users', "email = ?", [$email]);

            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach ($user as $k => $v) {
                        if ($k !== 'password') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public function isAuto ()
    {
        return isset($_SESSION['user']);
    }

    public function isAdmin()
    {
        return (isset($_SESSION['user']))
            && $_SESSION['user']['role'] === 'admin'
            &&  $_SESSION['user']['name'] === 'admin';
    }

}