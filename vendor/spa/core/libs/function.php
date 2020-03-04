<?php

function dd($arr, $die = false)
{
    echo '<pre>' . print_r($arr, true) . "</pre>";
    if ($die) die;
}


function redirect($http = false)
{
    if ($http) {
        $redirect = $http;

    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("Location: {$redirect}");
    die;
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}