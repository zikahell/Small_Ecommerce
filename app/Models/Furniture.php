<?php


class Furniture extends Product
{
    public function storeFurniture($table, $data)
    {
        return $this->conn->insert($table, $data);
    }
}