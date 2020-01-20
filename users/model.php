<?php
include '../config/config.php';

class Users
{
    private $config;
    private $conn;

    function __construct()
    {
        //make database connection
        $this->config = new Config();
        $this->conn = $this->config->makeConnection();
    }
    // add new user in the database
    function addUser($data)
    {
        $response = array('success' => false);
        if (!$this->conn)
            $response['error'] = 'Database connection failed';
        else {
            $password_hash = password_hash($data['pass'], PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (user_name,password,is_admin) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);
            if ($stmt->execute([$data['user_id'], $password_hash, isset($data['is_admin'])])) {
                $response['message'] = 'New user is added successfully';
                $response['success'] = true;
            } else
                $response['error'] = 'Something wrong happened, please try again';
        }
        return $response;
    }
}