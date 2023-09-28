<?php
session_start();
include('../config/db.php');


// insert into database
if(isset($_POST['insert_btn'])){
    $name = $_POST['name'];
    $profession = $_POST['profession'];
    $message = $_POST['message'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $name."-".date("Y-m-d")."-".".".$extension = end($explode);
    $path = "../images/testimonial_image/".$new_name;
   if(move_uploaded_file($temp_name, $path)){
    if($name &&  $profession && $image && $message){
        $insert_query = "INSERT INTO testimonial (name,profession,image,message) VALUES ('$name','$profession','$new_name','$message')";
        mysqli_query($db_connect,$insert_query);
        $_SESSION['testimonial_success'] = "Your Message has been Sent Successfully.";
        header("location: testimonial.php");
       

    }else{
        $_SESSION['testimonial_error'] = "You have to fill all information.";
        header("location: testimonial_add.php");
    }

   }
 
}

//    change status
  
if(isset($_GET['change_status'])){
    $id= $_GET['change_status'];

      $select_status = "SELECT * FROM testimonial WHERE id='$id'";
      $connect =  mysqli_query($db_connect,$select_status);
      $specif_element = mysqli_fetch_assoc($connect);
      $get_status = $specif_element['status'];
    //   print_r($get_status);

      if($get_status == 'deactive'){
        $update_status = "UPDATE testimonial SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_status);
        header("location: testimonial.php");
      }else{
        $update_status = "UPDATE testimonial SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_status);
        header("location: testimonial.php");
      }

}

// delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM testimonial WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['delete_item'] = "Your testimonial deleted successfully";
    header("location: testimonial.php");
}



// UPDATE OPERATION

if(isset($_POST['update_btn'])){
    $id = $_POST['testimonial_id'];
    $name = $_POST['name'];
    $profession = $_POST['profession'];
    $message = $_POST['message'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $id.$name."-".date("Y-m-d")."-".".".$extension;
    $path = "../images/testimonial_image/".$new_name;
    
    if(  $name &&  $profession &&  $message){
      $update_query = "UPDATE testimonial SET name='$name', profession='$profession', message='$message' WHERE id='$id'";
      mysqli_query($db_connect,$update_query);
      $_SESSION['testimonial_update_success'] = "Your Message Updated successfully";
      header("location: testimonial.php");
  }else{
       $_SESSION['testimonial_update_error'] = "You have to fill all information.";
       header("location: testimonial_update.php");
  }

      // getting single image for replace that image 
      $select_data ="SELECT * FROM testimonial WHERE id='$id'";
      $connect=mysqli_query($db_connect,$select_data);
      $single_data = mysqli_fetch_assoc($connect);
      $db_image= $single_data['image'];
      $db_path = "../images/testimonial_image/".$db_image;

  if($image){
    if(move_uploaded_file($temp_name, $path )){
        unlink($db_path);
        $update_query = "UPDATE testimonial SET image='$new_name' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['testimonial_update_success'] = "Your Message Updated successfully";
        header("location: testimonial.php");

    }
  }


}



?>