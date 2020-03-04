<?php


namespace spa;


class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], '/');
        session_start();
        Router::dispatch($query);
    }
}