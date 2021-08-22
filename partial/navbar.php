<?php 
require_once ('database/database.php');
$users=selectAllUser();
session_start();
foreach ($users as $user):
  if($user['username']==$_SESSION['admin']):
?>
<nav class="navbar navbar-dark bg-dark navbar-expand-sm sticky-top">
  <a class="navbar-brand" href="#">
    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo">
    P-Event
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="?page=event" class="nav-link active fa fa-calendar aria-hidden=true">
                    Events
                </a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="?page=intergration">Intergration</a>
                  <a class="dropdown-item" href="?page=graduation">Graduation</a>
                </div>
              </div>

            </li>
            <?php if($user['role']=="admin"):?>
            <li class="nav-item">
                <a href="?page=user" class="nav-link active fa fa-address-book aria-hidden=true">
                    Manage
                </a>
            </li>
            <?php endif; ?>
            <?php if($user['role']=="admin"):?>
            <li class="nav-item">
                <a href="?page=manage" class="nav-link active fa fa-address-book aria-hidden=true">
                    Admin
                </a>
            </li>
            <?php endif; ?>
        </ul>
      </div>
      <a href="userProcess/register.php"><i class="fa fa-sign-out btn-danger" style="height: 30px; width: 70px;display: flex; text-align: center; align-items: center; justify-content: center; border-radius: 5px; text-decoration: none; ">Logout</i></a>
  </div>
</nav>
<?php
endif;
endforeach;
?>

