<?php



class App
{
    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];
    public function __construct()
    {
        $this->prepareUrl();
        $this->render();
    }
    private function prepareUrl()
    {
        error_reporting(E_ALL ^ E_WARNING);
        $u = $_SERVER["REDIRECT_URL"];
        $u = explode("/", trim($_SERVER['REDIRECT_URL'] ?? '', '/'));
        $this->controller = !empty($u[0]) ? ucwords($u[0]) . 'Controller' : 'ProductController';
        $this->action = isset($u[1]) ? $u[1] : 'index';
        $this->params = isset($u[2]) ? array_slice($u, 2) : [];
    }
    private function render()
    {
        if (class_exists($this->controller)) {
            $con = new $this->controller;
            if ($this->action == 'add-product') {
                $this->action = 'add';
            }
            if (method_exists($con, $this->action)) {
                call_user_func_array(array($con, $this->action), $this->params);
            } else {
                echo 'Method not exist';
            }
        } else {
            echo 'Controller not Exist';
        }
    }
}
