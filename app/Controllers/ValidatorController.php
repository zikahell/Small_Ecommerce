<?php



abstract class ValidatorController
{
    protected function testInput($data)
    {
        $data = trim($data ?? '');
        $data = htmlspecialchars($data);
        return $data;
    }
    protected function validateNumber($num)
    {
        if (!is_numeric($num) || $num <= 0) {
            return false;
        } else {
            return true;
        }
    }
    protected function validateString($str)
    {
        if (is_numeric($str) || $str < 5) {
            return false;
        } else {
            return true;
        }
    }
}
