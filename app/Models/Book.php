<?php



class Book extends Product
{

    public function storeBook($table, $data)
    {
        return $this->conn->insert($table, $data);
    }
    public function getBooks()
    {
        return $this->conn->get('books');
    }
}
