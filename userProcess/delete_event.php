<?php
    require_once('../database/database.php');
    $event_id = $_GET['event_id'];
    $isEventDeleted = deleteEvent($event_id);
    if($isEventDeleted) {
        header("Location:../index.php?page=event");
    }
?>