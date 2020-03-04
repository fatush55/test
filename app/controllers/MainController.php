<?php


namespace app\controllers;


use app\models\User;
use RedBeanPHP\R;
use spa\libs\Pogination;

class MainController extends AppController
{
    public function indexAction()
    {
        $admin = $this->admin;
        $auto = $this->auto;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $count = R::count('documents');
        $pagination = new Pogination($page, $perpage, $count);
        $start = $pagination->getStart();

        $documents = R::getAll(
            "SELECT `documents`.*, `decision`.`title` as `decision`, `justice`.`title` as `justice` 
                FROM `documents`
                JOIN `decision` ON `documents`.`decision_id` = `decision`.`id`
                JOIN `justice` ON `documents`.`justice_id` = `justice`.`id`
                ORDER BY `documents`.`id` DESC
                LIMIT {$start},{$perpage}"
        );


        $this->setData(compact('documents', 'pagination', 'admin', 'auto'));
    }
}