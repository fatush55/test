<?php


namespace app\controllers;

use app\models\User;

class UserController extends AppController
{

    public function signupAction()
    {
        if ($_POST) {
            $data = $_POST;
            $user = new User();
            $user->load($data);

            if (!$user->validate($data) || !$user->checkUnique() || !$user->checkAdmin()) {
                $user->getError();
                redirect();
            } else {
                $user->attrebutes['password'] = password_hash($user->attrebutes['password'], PASSWORD_DEFAULT);
                $user->save('users');
                redirect('/user/login');
            }
        }
    }

    public function loginAction()
    {

        if ($_POST) {
            $date = $_POST;
            $user = new User();
            if ($user->login()) {
                redirect('/');
            } else {
                $_SESSION['error'] = '<p>Such users was not found</p>';
                redirect();
            }
        }
    }

    public function logoutAction()
    {
        if (!empty($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }
}