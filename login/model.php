<?php
include '../config/config.php';

class Login
{
    private $config;
    private $conn;

    function __construct()
    {
        $this->config = new Config();
        $this->conn = $this->config->makeConnection();
    }

    function validateUser($data)
    {
        $response = array('success' => false);
        $response['error'] = 'Your user name or password is incorrect.';
        if (!$this->conn)
            $response['error'] = 'Database connection failed';
        else {
            $stmt = $this->conn->prepare("SELECT * FROM users where user_name = :name");
            $stmt->bindParam(':name', $data['user_id']);
            $stmt->execute();
            foreach ($stmt->fetchAll() as $k => $v) {
                if (password_verify($data['pass'], $v['password'])) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION["user"] = $v;
                    $response['message'] = 'You are successfully logged in';
                    $response['error'] = '';
                    $response['success'] = true;
                }
            }
        }
        return $response;
    }
}
