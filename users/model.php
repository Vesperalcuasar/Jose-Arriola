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
            if ($stmt->execute([$data['user_id'], $password_hash, isset($data['is_admin']) ? 1 : 0])) {
                $response['message'] = 'New user is added successfully';
                $response['success'] = true;
            } else
                $response['error'] = 'Something wrong happened, please try again';
        }
        return $response;
    }

    function getUsers()
    {
        $response = array('success' => false);
        if (!$this->conn)
            $response['error'] = 'Database connection failed';
        else {
            $flag = 0;
            $stmt = $this->conn->prepare("SELECT id,user_name,is_admin FROM users where is_deleted = :flag");
            $stmt->bindParam(':flag', $flag);
            $stmt->execute();
            $response['users'] = $stmt->fetchAll();
            $response['success'] = true;
        }
        return $response;
    }

    function deleteUser($data)
    {
        $response = array('success' => false);
        if (!$this->conn)
            $response['error'] = 'Database connection failed';
        else {
            $stmt = $this->conn->prepare("UPDATE users set is_deleted = 1 where id = :id");
            $stmt->bindParam(':id', $data['id']);
            if ($stmt->execute()) {
                $response['message'] = 'User is deleted successfully';
                $response['success'] = true;
            } else
                $response['error'] = 'Something wrong happened, please try again';
        }
        return $response;
    }
}