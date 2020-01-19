<?php
include 'model.php';
$model = new AddUsers();

if (isset($_POST['action'])) {
    $result = $model->addUser($_POST);
    echo json_encode($result);
} else
    die('go away');