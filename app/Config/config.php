<?php


define("BURL", "http:" . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . "test.local" . DIRECTORY_SEPARATOR);
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "company");

function url($url = '')
{
    return BURL . $url;
}
