<?php
session_start();
if (!isset($_SESSION['tuvastamine'])) {
    header('Location: php/Authorization.php');
    exit();
}
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: php/Authorization.php');
    exit();
}
?>