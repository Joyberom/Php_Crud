<?php
    require_once "db.php";
    require_once "User.php";
    $user = new User($db);
    if(!$user->isLoggedIn()){
        header("location: login.php");
    }
    $currentUser = $user->getUser();
    if(isset($_GET["Id"])){
        $query = $db->prepare("DELETE FROM `Clientes` WHERE Id=:Id");
        $query->bindParam(":Id", $_GET["Id"]);
        $query->execute();
        header("location: index.php");
    }
?>
