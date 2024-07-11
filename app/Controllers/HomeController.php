<?php


class HomeController
{
    public function index()
    {
        $emp = new Product();
        $data['employees'] = $emp->getAllProducts();

        View::load('t', $data);
    }
}
