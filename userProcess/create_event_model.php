<?php
  require_once('../database/database.php');
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $isCreatedEvent = createEvent($_POST);
  if($isCreatedEvent) {
    header("Location: https://localhost/php-database-project/index.php?page=manage");
  }
}