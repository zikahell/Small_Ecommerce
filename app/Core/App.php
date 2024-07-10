<?php



class App
{
    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];
    public function __construct()
    {
        $u = explode("/", trim($_SERVER['REDIRECT_URL'], '/'));
        //echo get_include_path();
        var_dump($u);
    }
}
