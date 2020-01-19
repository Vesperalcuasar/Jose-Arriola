<?php
include 'model.php';
$model = new AddUsers();

if (isset($_POST['action'])) {
    $result = $model->addUser($_POST);
    return $result;
} else
    die('go away');