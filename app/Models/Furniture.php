<?php


class Furniture extends Product
{
    public function storeFurniture($table, $data)
    {
        return $this->conn->insert($table, $data);
    }
    public function getFurniture()
    {
        return $this->conn->get('furniture');
    }
}
