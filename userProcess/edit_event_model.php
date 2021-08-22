<?php 
    require_once('../database/database.php');
   if($_SERVER['REQUEST_METHOD'] == 'POST') {
       $isEventUpdated = updateEvent($_POST);
       if($isEventUpdated){
           header("Location: https://localhost/php-database-project/index.php?page=manage");
       }
   }
?>