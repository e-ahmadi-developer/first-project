<?php

class Db {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "user";
    public $conn;
    public function __construct()
    {
        try {
           $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db" , $this->user , $this->pass);
           $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die(json_encode(['error' => $e->getMessage()]));
        }

    }
}