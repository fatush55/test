<?php


namespace app\controllers;


use app\models\AppModal;
use app\models\User;
use RedBeanPHP\R;
use spa\basic\Controller;

class AppController extends Controller
{
    public $admin;
    public $auto;

    public function __construct($route)
    {
        parent::__construct($route);
        $user = new User();
        $this->admin = $user->isAdmin();
        $this->auto = $user->isAuto();
        new AppModal();
        self::createAdmin();
    }

    public static function createAdmin()
    {
        $stub_user = R::findOne('users', 'role = ?', ['admin']);
        if (empty($stub_user)) {
            $data = [
                'role' => 'admin',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '123456',
            ];
            $tbl = \R::dispense('users');
            $data['password'] = password_hash( $data['password'], PASSWORD_DEFAULT);
            foreach ($data as $k => $v) {
                $tbl->$k = $v;
            }
            R::store($tbl);
        }
    }

}