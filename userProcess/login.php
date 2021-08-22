<!DOCTYPE html>
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
    <div class="p-4 ">
      <?php 
        require_once("../database/database.php");
        $message = "";
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
          $isLogin = login($_POST);
          if($isLogin){
            header("Location: https://localhost/php-database-project/");
          }else{
            $message = "Email or Password not match";
          }
        }
      ?>
      <form action="#" method="post" class="rounded-lg col-lg-5 col-md-4 m-auto p-3 bg-none  border border-dark" >
        <div class="text-center">
            <h3>Login</h3>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" required class="form-control" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="password" required class="form-control" id="password" placeholder="Password" length="8">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" required class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-row">
            <div class="col-5">
                <a href="https://localhost/php-database-project/index.php"><button type="submit" class="btn btn-secondary w-100">Login</button></a>
            </div>
            <div class="col-2 text-center">
                <p>OR</p>
            </div>
            <div class="col-5">
                <a href="register.php"><button type="button" class="btn btn-warning w-100"><i class="fa fa-user" aria-hidden="true"></i> Register </button></a>
            </div>
        </div>
      </form>
    </div>
  </div> 
</body>
</html>