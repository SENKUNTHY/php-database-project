<!DOCTYPE >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div  style="width: 100%; height: 100vh; ">
    <?php
        include_once('../database/database.php');
        $id = $_GET['user_id'];
        $users = selectOneUser($id);
        foreach ($users as $user):
    ?>
    <div class="p-4 ">
        <form action="edit_user_model.php" method="post" class="rounded-lg col-lg-5 col-md-4 m-auto bg-none border border-dark p-3" enctype="multipart/form-data">
            <div class="text-center">
                <h3>New User</h3>
            </div>
            <input type="hidden" value="<?= $user['user_id']?>" name="user_id">
            <small class="text-danger text-center"></small>
            <div class="form-group">
                <label for="username" >Username</label>
                <input type="text" name="username" required class="form-control" id="username" placeholder="Enter username" value="<?= $user['username']?>">
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="pass" >Password</label>
                    <input type="password" name="pass" required class="form-control" id="pass" placeholder="Password" length="8"value="<?= $user['password']?>" >
                </div>
                <div class="col form-group">
                    <label for="cfpassword" >Confirm password</label>
                    <input type="password" name="cfpassword" required class="form-control" id="cfpass" placeholder="Password" length="8">
                </div>
            </div>
            <div class="form-group">
                <label for="email" >Email address</label>
                <input type="email" name="email" required class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $user['email']?>">
            </div>
            <div>
                <label for="up" class="btn bg-none" style="background: #fff">Add Photo</label>
                <div class="form-group">
                    <input type="file" name="profile_img" class=form-control>
                </div>    
            </div>
            <div class="form-row">
                <div class="col-5">
                    <a href="http://localhost/php-database-project/?page=user"><button type="submit"  class="btn btn-success w-100 fa fa-user"aria-hidden="true">Update</button></a>
                </div>
            </div>
        </form>
    </div>
    <?php endforeach; ?>
  </div> 
</body>

</html>