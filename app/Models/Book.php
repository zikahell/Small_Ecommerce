<?php



class Book extends Product
{

    public function storeBook($table, $data)
    {
        return $this->conn->insert($table, $data);
    }
}