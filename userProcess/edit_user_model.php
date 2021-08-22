<?php 
    require_once('../database/database.php');
   if($_SERVER['REQUEST_METHOD'] == 'POST') {
       $isEventUpdated = updateUser($_POST);
       if($isEventUpdated){
           header("Location: https://localhost/php-database-project/?page=manage");
       }
   }
?>