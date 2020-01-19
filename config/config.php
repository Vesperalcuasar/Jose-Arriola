<?php

class Config
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "oc";

    public function makeConnection()
    {

        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=DPE", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            //echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}
