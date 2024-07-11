<?php


class Product extends DB
{
    protected $table;
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }
    public function getAllProducts()
    {
        return $this->conn->get('employee');
    }
}
