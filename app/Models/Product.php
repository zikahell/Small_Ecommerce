<?php


abstract class Product extends DB
{
    protected $table = 'products';
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }
    public function getAllProducts()
    {
        return $this->conn->get('employee');
    }
    public function store($data)
    {
        return $this->conn->insert($this->table, $data);
    }
}
