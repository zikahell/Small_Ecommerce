<?php





class DVD extends Product
{
    public function storeDvd($table, $data)
    {
        return $this->conn->insert($table, $data);
    }
}