<?php require_once('../partial/header.php'); ?>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-5 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Event</h5>
            <form action="create_event_model.php" method="post" enctype="multipart/form-data">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="title" placeholder="Event Title" required>
              </div>
              <div class="form-floating mb-3">
                <input type="datetime-local" class="form-control" name="start_date" placeholder="Start Date" required>
              </div>
              <div class="form-floating mb-3">
                <input type="datetime-local" class="form-control" name="end_date" placeholder="End Date" required>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="description" placeholder="Description" required>
              </div>
              <div class="form-floating mb-3">
                <input type="file" class="form-control" name="image" >
              </div>
              <div class="form-floating mb-3">
                <select name="categorySeleted" required>
                <option value="selected">Choose event type</option>
                <option value="1">Intergration</option>
                <option value="2">Graducation</option>
                </select>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold " name ="createEvent" type="submit">Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once('../partial/footer.php'); ?>