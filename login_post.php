<?php
 include('./config/db.php');
 session_start();
$email = $_POST['email'];
$password = $_POST['password'];


if($email && $password){
    $encrypt = md5($password);
    $select_users = "SELECT COUNT(*) AS validity FROM users WHERE email='$email' AND password='$encrypt'";

    $select_connect = mysqli_query($db_connect,$select_users);
// print_r(mysqli_fetch_assoc($select_connect)['validity'] == 1);
 
    if(mysqli_fetch_assoc($select_connect)['validity'] == 1){
        $select_info = "SELECT * FROM users WHERE email='$email'";
        $connect = mysqli_query($db_connect,$select_info);
       
       $user = mysqli_fetch_assoc($connect);
       $_SESSION['admin_id'] = $user['id'];
       $_SESSION['admin_name'] = $user['name'];
       $_SESSION['admin_email'] = $user['email'];

       $_SESSION['login_success'] = "WELCOME TO DASHBOARD";
       header("location: ./dashboard/home.php");
        
    }
    else{
        $_SESSION['login_error'] = "You have to do registration first";
        header("location: login.php");
    }
}
  
?>