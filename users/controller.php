<?php
include 'model.php';
$model = new Users();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'add-user':
            // process post request for add user and return response in json
            $result = $model->addUser($_POST);
            echo json_encode($result);
            break;
        case 'get-users-list':
            // get user's list
            $result = $model->getUsers();
            echo json_encode($result);
            break;
        case 'delete-user':
            // delete user
            $result = $model->deleteUser($_POST);
            echo json_encode($result);
            break;
    }
} else
    die('go away');