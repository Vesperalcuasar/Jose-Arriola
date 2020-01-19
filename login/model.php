<?php
//include '../config/config.php';
//
//class AddUsers
//{
//    private $config;
//    private $conn;
//
//    function __construct()
//    {
//        $this->config = new Config();
//        $this->conn = $this->config->makeConnection();
//    }
//
//     function addUser($data)
//     {
//         $response = array('success' => false);
//         if (!$this->conn)
//             $response['error'] = 'Database connection failed';
//         else {
//             $sql = "INSERT INTO users (user_name,password) VALUES (?,?)";
//             $stmt = $this->conn->prepare($sql);
//             if ($stmt->execute([$data['user_id'], $data['pass']])) {
//                 $response['message'] = 'New user is added successfully';
//                 $response['success'] = true;
//             }
//             else
//             $response['error'] = 'Something wrong happened, please try again';
//         }
//         return $response;
//     }
//}