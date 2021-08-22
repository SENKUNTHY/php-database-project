<?php
    require_once('../database/database.php');
    $user_id = $_GET['user_id'];
    $isUserDeleted = deleteUser($user_id);
    if($isUserDeleted) {
        header("Location:../index.php?page=user");
    }
?>