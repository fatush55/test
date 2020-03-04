<?php


namespace app\models;


class Document extends AppModal
{
    public $attrebutes = [
        'title' => '',
        'text' => '',
        'decision_id' => '',
        'justice_id' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['text'],
            ['decision_id'],
            ['justice_id']
        ],
    ];

}