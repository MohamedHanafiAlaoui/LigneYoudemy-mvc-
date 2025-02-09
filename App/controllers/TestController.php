<?php
namespace App\Controllers;

use App\Libraries\Database;

class TestController
{
    public function test()
    {
       
        $db = new Database();
        $message = $db->testConnection();

       
        echo $message;
    }
}