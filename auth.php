<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //header("location: users/index.php");
} else {
    header("location: ../index.php");
}