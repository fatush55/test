<?php


namespace app\controllers;


use app\models\User;
use RedBeanPHP\R;
use spa\libs\Pogination;

class SearchController extends AppController
{
    public function typeaheadAction()
    {
        if ($this->isAjax()) {
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;

            if ($query) {
                $products = R::getAll(
                    "SELECT id, title 
                        FROM documents 
                        WHERE `id` LIKE ? 
                        OR `decision_id` LIKE ? 
                        OR `title` LIKE ? 
                        LIMIT 11"
                    , ["%{$query}%", "%{$query}%", "%{$query}%"]
                );
                echo json_encode($products);
            }
        }
        die;
    }

    public function indexAction()
    {
        $query = isset($_GET['s']) ? $_GET['s'] : null;
        $admin =  $admin = $this->admin;
        if ($query){

            $documents = R::getAll(
                "SELECT `documents`.*, `decision`.`title` as `decision`, `justice`.`title` as `justice` 
                FROM `documents`
                JOIN `decision` ON `documents`.`decision_id` = `decision`.`id`
                JOIN `justice` ON `documents`.`justice_id` = `justice`.`id`
                WHERE `documents`.`decision_id` LIKE ? 
                OR `documents`.`title` LIKE ? 
                OR `documents`.`id` LIKE ?",
                ["%{$query}%", "%{$query}%", "%{$query}%"]
            );
        }

        $this->setData(compact('documents','admin'));
    }
}