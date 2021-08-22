<?php
    // connect database 
    function db() {
        return new mysqli('localhost', 'root', '', 'pnc_event_management_db');
    } 
    // search event
    function searchEvent($value){
            $eventTitle = $value['title'];
            return db()->query("SELECT * FROM events WHERE  title LIKE '%$eventTitle%' ");
    }
    // get all events
    function getAllEvents() {
        return db()->query("SELECT * FROM events ORDER BY event_id DESC");
    }
    // create new event
    function createEvent($value) {
        $title = $value['title'];
        $description = $value['description'];
        $start_date = $value['start_date'];
        $end_date = $value['end_date'];
        $category = $value['categorySeleted'];
        // add image
        $img_Name = $_FILES['image']['name'];
        $img_Size = $_FILES['image']['size'];
        $img_Type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $dir_fold = "../userProcess/images/";
        move_uploaded_file($tmp_name, $dir_fold.$img_Name);
        //query insert to database
        return db()->query("INSERT INTO events(title,start_date,end_date,description,user_id,cat_id,image) VALUES('$title','$start_date','$end_date','$description',1,'$category','$img_Name');");
    }
    // get one event
    function getOneEvent($id) {
        //query to select one event
        return db()->query("SELECT * FROM events WHERE event_id = $id");
    }
    // get only  intergration event
    function getIntergrationEvent(){
        return db()->query("SELECT * FROM events WHERE cat_id = 1");
    }
    // get only 
    function getGraduationEvent(){
        return db()->query("SELECT * FROM events WHERE cat_id = 2");
    }
    function deleteEvent($id) {
        return db()->query("DELETE FROM events WHERE event_id = $id");
    }

    function updateEvent($value) {
        if(isset($_POST['updateEvent'])){
            $title = $value['title'];
            $start_date = $value['start_date'];
            $end_date = $value['end_date'];
            $description = $value['description'];
            $event_id = $value['event_id'];
            $category = $value['categorySeleted'];
            $img_Name = $_FILES['image']['name'];
            $img_Size = $_FILES['image']['size'];
            $img_Type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $dir_fold = "../userProcess/images/";
            move_uploaded_file($tmp_name, $dir_fold.$img_Name);
        return db()->query("UPDATE events SET title='$title', start_date='$start_date',end_date='$end_date',description='$description',cat_id='$category',user_id=1,image='$img_Name' WHERE event_id = $event_id");
        }
    }    
        
    // Create User
    function addUser($value) {
        $username = $value['username'];
        $password = $value['pass'];
        $passwordEncrypt = password_hash($password, PASSWORD_DEFAULT);
        $cf_password = $value['cfpassword'];
        $email = $value['email'];
        $profileName = $_FILES['profile_img']['name'];
        $profileSize = $_FILES['profile_img']['size'];
        $profileType = $_FILES['profile_img']['type'];
        $profile_tmp_name = $_FILES['profile_img']['tmp_name'];
        $pro_dir = "../userProcess/images/";
        move_uploaded_file($profile_tmp_name,$pro_dir.$profileName);
        $isValidEmail = true;
        $allUser = selectAllUser();
        foreach($allUser as $user) {
            if($email == $user['email'] or $password != $cf_password) {
                $isValidEmail = false;
            }
        }
        if($isValidEmail) {
            return db()->query("INSERT INTO users (userProfile,username, email, password, role) VALUES ('$profileName','$username','$email', '$passwordEncrypt','Normal')");
        } else {
            return $isValidEmail;
        }
       
    }

    // GET ALL USER 
    function selectAllUser() {
        return db()->query("SELECT * FROM users");
    }
    // get one user
    function selectOneUser($id){
        return db()->query("SELECT * FROM users WHERE user_id= $id");
    }
    // delete user
    function deleteUser($id) {
        return db()->query("DELETE FROM users WHERE user_id = $id");
    }

    //update user
    function updateUser($value){
        $user_id = $value['user_id'];
        $username = $value['username'];
        $password = $value['pass'];
        $cf_password = $value['cfpassword'];
        $email = $value['email'];
        $profileName = $_FILES['profile_img']['name'];
        $profileSize = $_FILES['profile_img']['size'];
        $profileType = $_FILES['profile_img']['type'];
        $profile_tmp_name = $_FILES['profile_img']['tmp_name'];
        $pro_dir = "../userProcess/images/";
        move_uploaded_file($profile_tmp_name,$pro_dir.$profileName);
        return db()->query("UPDATE users SET username='$username',email='$email', password='$password',role='public',userProfile='$profileName' WHERE user_id = $user_id");
       

    }

    function login($value){
        $admin = trim($value['username']);
        $email = trim($value['email']);
        $password = trim($value['password']);

        session_start();
        $_SESSION['admin'] = $admin;
        $login = false;
        // $getUser = db()->query("SELECT * FROM users");
        $users = selectAllUser();
        foreach($users as $user) {
            if($user['username'] === $admin and password_verify($password, $user['password']) ){
                $login = true;
            }
        }
        return $login;
    }

?>
