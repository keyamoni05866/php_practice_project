<?php


session_start();
include('../config/db.php');


// about add query
if(isset($_POST['insert_btn'])){
    $profession = $_POST['profession'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $gmail.$profession."-".date("Y-m-d")."-".".".$extension ;
    $path = "../images/about_image/".$new_name;

    if(move_uploaded_file($temp_name, $path)){
        if(  $profession  &&  $facebook &&   $linkedin && $gmail && $phone && $address &&   $description &&  $image ){
            $insert_about = "INSERT INTO about (profession,image,facebook,linkedin,gmail,phone,address,description) VALUES ('$profession','$new_name','$facebook','$linkedin','$gmail','$phone','$address','$description')";
            mysqli_query($db_connect,$insert_about );
            $_SESSION['about_success'] = "Your Information added successfully";
            header("location: about.php");
      }else{
          $_SESSION['about_error'] = "You have to fill all information.";
          header("location: about_add.php");
      }
    }
}


// about delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM about WHERE id='$id'";
    mysqli_query($db_connect, $delete_query);
    $_SESSION['about_delete'] = "Your Information Deleted successfully";
    header("location: about.php");
}

// about update operation

if(isset($_POST['update_btn'])){
    $id = $_POST['about_id'];
    $profession = $_POST['profession'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $gmail.$profession."-".date("Y-m-d")."-".".".$extension ;
    $path = "../images/about_image/".$new_name;
      
    if(  $profession  &&  $facebook &&   $linkedin && $gmail && $phone && $address &&   $description  ){
    $update_about = "UPDATE  about SET   profession='$profession',facebook='$facebook',linkedin='$linkedin',gmail='$gmail',phone='$phone',address='$address',description='$description' WHERE id='$id'";
        mysqli_query($db_connect,$update_about) ;
        $_SESSION['about_success'] = "Your Information Updated successfully";
        header("location: about.php");
  }

    // getting single image for replace that image 
    $select_data ="SELECT * FROM about WHERE id='$id'";
    $connect=mysqli_query($db_connect,$select_data);
    $single_data = mysqli_fetch_assoc($connect);
    $db_image= $single_data['image'];
    $db_path = "../images/about_image/".$db_image;

if($image){
  if(move_uploaded_file($temp_name, $path )){
      unlink($db_path);
      $update_query = "UPDATE about SET image='$new_name' WHERE id='$id'";
      mysqli_query($db_connect,$update_query);
      $_SESSION['about_success'] = "Your Information Updated successfully";
      header("location: about.php");

  }
}
  

}

// change status code

if(isset($_GET['change_status'])){

    $id= $_GET['change_status'];

      $select_status = "SELECT * FROM about WHERE id='$id'";
      $connect=  mysqli_query($db_connect,$select_status);
      $specif_element = mysqli_fetch_assoc($connect);
     
      $get_status = $specif_element['status'];

     
    if($get_status == 'deactive'){
             $update_query = "UPDATE about SET status='active' WHERE id='$id'";
             mysqli_query($db_connect,$update_query);
             header("location: about.php");
    }else{
            $update = "UPDATE about SET status='deactive' WHERE id='$id'";
            mysqli_query($db_connect,$update);
            header("location: about.php");
    }
}
?>