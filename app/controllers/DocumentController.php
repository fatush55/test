<?php


namespace app\controllers;


use app\models\Document;
use RedBeanPHP\R;

class DocumentController extends AppController
{
    public function showAction()
    {
        $id = $_POST['id'];
        $document = R::findOne('documents', 'id = ?', [$id]);
        $this->loadView('show', compact('document'));
    }

    public function addAction()
    {
        $decision = R::findAll('decision');
        $justice = R::findAll('justice');
        $this->setData(compact('justice', 'decision'));
    }

    public function storeAction()
    {
        $date = $_POST;
        $doc = new Document();
        $doc->load($date);

        if (!$doc->validate($date)){
            $doc->getError();
            redirect();
        } else {
            $doc->save('documents');
        }
        redirect('/');
    }

    public function editAction()
    {
        $id = $_GET['id'];
        $doc = R::findOne('documents', 'id = ?', [$id]);
        $justice = R::findAll('justice');
        $decision = R::findAll('decision');

        $this->setData(compact('doc', 'justice', 'decision'));
    }

    public function updateAction()
    {
        $date = $_POST;
        $doc = new Document();
        $doc->load($date);

        if (!$doc->validate($date)){
            $doc->getError();
            redirect();
        } else {
            $doc->attrebutes['updated_at'] = date("Y-m-d H:i:s");
            $pattern = "/[<h1]?+[>|\/>]([A-Z][a-z0-9]+?[ A-za-z0-9]*)[<].*?[<\/h1]/ms";
            $replacement = '>' . $doc->attrebutes['title'] . '</';
            $doc->attrebutes['text'] = preg_replace($pattern, $replacement, $doc->attrebutes['text']);
            $doc->update('documents',$date['id']);
        }

        redirect('/');
    }

    public function removeAction()
    {
        $id = $_GET['id'];
        $bean = R::load('documents', $id);
        if (!empty($bean)) \R::trash($bean);

        redirect();
    }
}