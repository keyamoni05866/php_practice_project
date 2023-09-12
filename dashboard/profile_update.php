<?php

include("../config/db.php");
session_start();

$name = $_POST['name'];
$name_update_btn = $_POST['name_update'];
$email = $_POST['email'];
$email_update_btn = $_POST['email_update'];

if(isset($name_update_btn )){
    if($name){
        $user_id = $_SESSION['admin_id'];
       $name_update_query = "UPDATE  users SET name='$name' WHERE id='$user_id'";
       mysqli_query($db_connect,$name_update_query);
       $_SESSION['admin_name'] = $name;
       $_SESSION['name_update_success'] = "Your Name Updated Successfully";
       header("location: profile.php");

       

    }else{
        $_SESSION['name_error'] = "New name is missing";
        header("location: profile.php");
    }
}

// email update is here
if(isset($email_update_btn)){
    if($email){
        $user_id = $_SESSION['admin_id'];
       $email_update_query = "UPDATE  users SET email='$email' WHERE id='$user_id'";
       mysqli_query($db_connect,$email_update_query);
       $_SESSION['admin_email'] = $email;
       $_SESSION['email_update_success'] = "Your Email Updated Successfully";
       header("location: profile.php");

       

    }else{
        $_SESSION['email_error'] = "New Email Field is missing";
        header("location: profile.php");
    }
}


?>