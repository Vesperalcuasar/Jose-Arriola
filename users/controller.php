<?php
include 'model.php';
$model = new Users();

if (isset($_POST['action'])) {
    // process post request for add user and return response in json
    $result = $model->addUser($_POST);
    echo json_encode($result);
} else
    die('go away');