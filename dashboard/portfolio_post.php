<?php
session_start();
include('../config/db.php');


// insert into database
if(isset($_POST['insert_btn'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $title."-".date("Y-m-d")."-".".".$extension = end($explode);
    $path = "../images/portfolio_image/".$new_name;
   if(move_uploaded_file($temp_name, $path)){
    if($title && $description && $image){
        $insert_query = "INSERT INTO portfolios (title,image,description) VALUES ('$title','$new_name','$description')";
        mysqli_query($db_connect,$insert_query);
        $_SESSION['portfolio_success'] = "Your Portfolio added successfully";
        header("location: portfolios.php");

    }else{
        $_SESSION['portfolio_error'] = "You have to fill all information.";
        header("location: portfolio_add.php");
    }

   }
 
}

//    change status
  
if(isset($_GET['change_status'])){
    $id= $_GET['change_status'];

      $select_status = "SELECT * FROM portfolios WHERE id='$id'";
      $connect =  mysqli_query($db_connect,$select_status);
      $specif_element = mysqli_fetch_assoc($connect);
      $get_status = $specif_element['status'];
    //   print_r($get_status);

      if($get_status == 'deactive'){
        $update_status = "UPDATE portfolios SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_status);
        header("location: portfolios.php");
      }else{
        $update_status = "UPDATE portfolios SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_status);
        header("location: portfolios.php");
      }

}

// delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM portfolios WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['delete_item'] = "Your portfolio deleted successfully";
    header("location: portfolios.php");
}



// UPDATE OPERATION

if(isset($_POST['update_btn'])){
    $id = $_POST['portfolio_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $id.$title."-".date("Y-m-d")."-".".".$extension;
    $path = "../images/portfolio_image/".$new_name;
    
    if($title && $description ){
      $update_query = "UPDATE portfolios SET title='$title',description='$description' WHERE id='$id'";
      mysqli_query($db_connect,$update_query);
      $_SESSION['portfolio_update_success'] = "Your Portfolio Updated successfully";
      header("location: portfolios.php");
  }else{
       $_SESSION['portfolio_update_error'] = "You have to fill all information.";
       header("location: portfolio_update.php");
  }

      // getting single image for replace that image 
      $select_data ="SELECT * FROM portfolios WHERE id='$id'";
      $connect=mysqli_query($db_connect,$select_data);
      $single_data = mysqli_fetch_assoc($connect);
      $db_image= $single_data['image'];
      $db_path = "../images/portfolio_image/".$db_image;

  if($image){
    if(move_uploaded_file($temp_name, $path )){
        unlink($db_path);
        $update_query = "UPDATE portfolios SET image='$new_name' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['portfolio_update_success'] = "Your Portfolio Updated successfully";
        header("location: portfolios.php");

    }
  }


}

?>