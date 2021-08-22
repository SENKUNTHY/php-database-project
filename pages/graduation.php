
<div class="container mt-3 mb-3 justify-content-start">
      <div class="row">
        <div class="col-md-12 offset-2">
        <div class="_blogCard mt-3 bg-white rounded pl-4 pr-4 pb-4 pt-4">
          <div class="row">
          <?php
            require_once('database/database.php');
            $events = getGraduationEvent();
            foreach($events as $event):
          ?>
            <div class="col-lg-7 col-md-12 col-sm-12 hvr-grow">
              <div class="row">
                <div class="col-md-12">
                  <img src="userProcess/images/<?= $event['image'] ?>" alt="" class="img-fluid shadow-lg rounded _moveTop">
                </div>
                <div class="col-md-12 d-inline-flex align-items-center justify-content-between">
                  <div class="_day d-inline-flex mt-2">
                    <span class="_date"><?= $event['start_date'] ?></span>
                  </div>
                  
                  <div class="_shareIcons align-self-end">
                    <ul class="list-unstyled m-0 d-inline-flex">
                      <li class="ml-1 mr-1"><i class="fa fa-eye" aria-hidden="true"></i></li>
                      <li class="ml-1 mr-1"><i class="fa fa-heart" aria-hidden="true"></i></li>
                      <li class="ml-1 mr-1"><i class="fa fa-share" aria-hidden="true"></i></li>
                    </ul>
                </div>
                </div>
                
              </div>
            </div>
            <div class="col-lg-6 col-md-14 col-sm-14">
              <div class="row">
                <div class="col-md-12">
                  <div class="pd-2 mb-2 mt-2 border-bottom">
                    <div class="_blogTitle font-weight-bold h5 mt-3 mb-3 text-danger">
                    <?= $event['title'] ?>
                    </div>
                    </div>
                </div>
                <div class="col-md-12 mb-5">
                  <div class="_content mt-2 text-muted">
                  <?= substr( $event['description'],0,50) ?>...
                  </div>
                  <a href="?page=event_detail&event_id=<?= $event['event_id'] ?>" class="btn btn-info text-white mt-3">Read more</a>
                </div>

              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        </div>
      </div>
</div>
<!-- End Detail info -->