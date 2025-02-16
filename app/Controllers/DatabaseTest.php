<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class DatabaseTest extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        try {
            $query = $db->query('SELECT 1');
            $result = $query->getResult();
            
            if (count($result) > 0) {
                echo "Database connection is successful.";
            } else {
                echo "Database connection failed.";
            }
        } catch (DatabaseException $e) {
            echo "Database connection failed: " . $e->getMessage();
        }
    }
}
