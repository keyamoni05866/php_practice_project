<?php
include('./config/db.php');
session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// name validation
if (!$name) {
   $_SESSION['name_error'] = "This field is required";
   header("location: registration.php");
}

// email validation
if ($email) {
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   } else {
      $_SESSION['email_error'] = "Your email is not valid";
      header("location: registration.php");
   }
} else {
   $_SESSION['email_error'] = "This field is required";
   header("location: registration.php");
}

//  password validation
if ($password) {
   //   if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
   //    $_SESSION['password_error']= "Your password should be strong.";
   //    header("location: registration.php");
   //   }
} else {
   $_SESSION['password_error'] = "This field is required";
   header("location: registration.php");
}

// confirm password

if ($confirm_password) {
} else {
   $_SESSION['cn_password_error'] = "This field is required";
   header("location: registration.php");
}

// database insert with validate email that means we will not allow the same email insert into database
if ($name && $email && $password && $confirm_password) {
   $email_validity = "SELECT COUNT(*) AS validity FROM users WHERE email='$email'";
   $email_validity_connect = mysqli_query($db_connect, $email_validity);

   if (mysqli_fetch_assoc($email_validity_connect)['validity'] == 0) {

      if ($password == $confirm_password) {
         $encrypt_pass = md5($confirm_password);

         $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$encrypt_pass')";
         mysqli_query($db_connect, $insert_query);
         $_SESSION['success_message'] = "Thanks for your registration";
         $_SESSION['s_users'] = "Dear $name";
         $_SESSION['s_email'] = "$email";
         $_SESSION['s_password'] = "$confirm_password";
         header("location: login.php");
      } else {
         $_SESSION['cn_password_error'] = "password didn't match";
         header("location: registration.php");
      }
   } else {
      $_SESSION['error_message'] = "This email  is already exists";
      header("location: registration.php");
   }
}
