<?php


namespace spa\basic;

class View
{
    public $route;
    public $controller;
    public $layout;
    public $view;
    public $date = [];

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->layout = $layout ?: LAYOUT;
    }

    public function render($date)
    {
        if (is_array($date))extract($date);
        $viewFile = APP . "/views/{$this->controller}/{$this->view}.php";
        if (is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
           echo "View | {$viewFile} | dot fount";
        }

        if ($this->layout !== false) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                echo "View | {$layoutFile} | dot fount";
            }
        }
    }

}