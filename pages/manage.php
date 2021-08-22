
<div class="card mt-3 mb-4 ml-3 mr-3 hvr-shrink">
  <div class="card-header text-center">
    <h1 class="text-danger">Data Management</h1>
  </div>
</div>
<div class="form-group mt-3 mb-3 mr-3 ml-3" style="width: 30%;">

    <form method="POST" action="" class="form-group">
        <h5 class="text-uppercase">Show table below:</h5>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="table" onchange="this.form.submit()">
            <option selected>Select Table</option>
            <option value="events">Event</option>
            <option value="users">User</option>
        </select>
    </form>
</div>
<?php
    if(isset($_POST["table"])){
        $table = $_POST["table"];
    }
    else{
        $table = "events";
    }
    ?>

<!-- <hr class="my-5 mr-3 ml-3"> -->


<!--Table Posts-->
<?php 

    if($table === "events"):

?>
<div class="mt-3 mb-3 ml-3 d-block">
    <h5 class="text-uppercase">Create Table selected above: </h5>
    <div class="d-flex justify-content-start p-2 hvr-hang">
        <a href="userProcess/create_event_html.php" class="btn btn-primary">CLICK HERE</a>
    </div>
</div>
<h5 class="ml-3">Post Table</h5>
    <div class="card-body mt-3 mb-3 ml-3 mr-3">
        <table class="table table-hover">
        <!--Table head-->
        <thead>
            <tr>
                <th>EventID</th>
                <th>CategoryID</th>
                <th>UserID</th>
                <th>Title</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th>Description</th>
                <th>Image</th>
                <th>Option</th>
            </tr>
        </thead>
        <!--Table head-->
        <?php 
            require_once('database/database.php');
            $events = getAllEvents();
            foreach($events as $event):
        ?>
        <!--Table body-->
        <tbody>
            <tr>
                <th scope="row"><?= $event['event_id'] ?></th>
                <td><?= $event['cat_id'] ?></td>
                <td><?= $event['user_id'] ?></td>
                <td><?= $event['title'] ?></td>
                <th><?= $event['start_date'] ?></th>
                <th><?= $event['end_date'] ?></th>
                <td><?=substr ($event['description'], 0, 150) ?></td>
                <td><div class="d-flex align-items-center"><img class="rounded" src="userProcess/images/<?= $event['image'] ?>" width="45" height="33"></td>
                <td>
                    <a href="userProcess/edit_event_html.php?event_id=<?= $event['event_id'] ?>"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i></a>
                    <a href="userProcess/delete_event.php?event_id=<?= $event['event_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        </tbody>
        <!--Table body-->
        <?php endforeach; ?>
        </table>
    <!--Table-->
</div>




<?php elseif($table === "users"): 

?>
<!--Table-->
<div class="mt-3 mb-3 ml-3 d-block">
    <h5 class="text-uppercase">Create Table selected above: </h5>
    <div class="d-flex justify-content-start p-2 hvr-hang">
        <a href="userProcess/register.php" class="btn btn-primary">CLICK HERE</a>
    </div>
</div>
<h5 class="ml-3">User Table</h5>
<div class="mt-3 mb-3 ml-3 mr-3">
<table class="table w-auto table table-hover">

    <!--Table head-->
    <thead>
        <tr>
        <th>ID</th>
        <th>profile</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Action</th>
        </tr>
    </thead>
    <!--Table head-->
    <?php
        require_once('database/database.php');
        $users = selectAllUser();
        foreach($users as $user):
    ?>
    <!--Table body-->
    <tbody>
        <tr>
        <tr>
            <td><?= $user['user_id']?></td>
            <td><img src="userProcess/images/<?= $user['userProfile']?>" alt="" style="width: 65px; height: 65px; border-radius: 50%;"></td>
            <td><?= $user['username']?></td>
            <td><?= $user['email']?></td>
            <td><?= $user['password']?></td>
            <td><?= $user['role']?></td>                      
        <?php
            if($user['role'] != 'admin'):
        ?>
        <td>
            <a href="userProcess/edit_user_html.php?user_id=<?= $user['user_id'] ?>"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i></a>
            <a href="userProcess/delete_user.php?user_id=<?= $user['user_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
        <?php elseif($user['role'] === 'admin'): ?>
        <td><i class="fa fa-users" aria-hidden="true"></i></td>
        <?php endif; ?>          
        </tr>
    </tbody>
    <!--Table body-->

    <?php endforeach; ?>
    </table>
</div>
<!--Table-->
<?php endif ?>