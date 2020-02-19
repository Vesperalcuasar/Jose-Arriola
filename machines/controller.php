<?php
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'save-machine':
            //save submitted machine data in the database
            echo 'saved';
            break;
    }
} else
    die('go away');