<?php
session_start();
include 'model.php';
$model = new Login();

if (isset($_POST['action'])) {
    $result = $model->validateUser($_POST);
    echo json_encode($result);
} else
    die('go away');