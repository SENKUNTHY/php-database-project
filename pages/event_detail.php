<div class="text-left mt-3 mb-3 ml-3 mr-3 shadow-lg">
  <?php
    require_once('database/database.php');
    $event_id = $_GET['event_id'];
    $detailEvent = getOneEvent($event_id);
    foreach($detailEvent as $event):
  ?>
  <div class="card-title rounded mx-auto d-block hvr-shrink mt-3 ml-3" style="width: 60%;">
   <img class="card-image-top rounded mt-3 mb-2" src="userProcess/images/<?= $event['image'] ?>" alt="" width="95%" height="60%">
  </div>
  <div class="card-header rounded">
    <h5 class="card-title d-flex">Event Title: 
      <p class="text-danger"><?= $event['title'] ?></p>
    </h5>
    <p class="card-text"><?= $event['description'] ?></p>
   
    <a href="" class="btn btn-danger">Our Events <i class="fa fa-calendar" aria-hidden="true"></i> </a>
  </div>
  
  <div class="card-footer text-muted">
    <p class="card-text">Start Event: <?= $event['start_date'] ?></p>
    <p class="card-text">End Event:<?= $event['end_date'] ?></p>
  </div>
  <?php endforeach; ?>
</div>