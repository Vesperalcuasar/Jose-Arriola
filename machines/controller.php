<?php
include 'model.php';
$model = new machine();

if (isset($_POST["data"][0]["action"])) {
    switch ($_POST["data"][0]["action"]) {
        case 'save-machine':
            //save submitted machine data in the database
            $result = $model->create($_POST["data"][0]);
            echo json_encode($result);
            break;
    }
} else
    die('go away');