<?php
    require_once "db.php";
    require_once "User.php";
    $user = new User($db);
    $user->logout();
    header('location: login.php');
 ?>
