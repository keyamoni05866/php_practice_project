<?php


session_start();
include('../config/db.php');


// service add query
if(isset($_POST['insert_btn'])){
    $title = $_POST['title'];
    $icon = $_POST['icon'];
    $description = $_POST['description'];

    if($title && $icon && $description){
          $insert_service = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
          mysqli_query($db_connect,$insert_service);
          $_SESSION['service_success'] = "Your Service added successfully";
          header("location: services.php");
    }else{
        $_SESSION['service_error'] = "You have to fill all information.";
        header("location: service_add.php");
    }
}


// service delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM services WHERE id='$id'";
    mysqli_query($db_connect, $delete_query);
    $_SESSION['service_delete'] = "Your Service Deleted successfully";
    header("location: services.php");
}

if(isset($_POST['update_btn'])){
    $title = $_POST['title'];
    $icon = $_POST['icon'];
    $description = $_POST['description'];
    $id = $_POST['service_id'];
      

    if($title && $icon && $description){
        $update_service = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
        mysqli_query($db_connect, $update_service);
        $_SESSION['service_update_success'] = "Your Service Updated successfully";
        header("location: services.php");
  }else{
      $_SESSION['service_update_error'] = "You have to fill all information.";
      header("location: service_edit.php");
  }

}
?>