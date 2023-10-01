<?php


session_start();
include('../config/db.php');


//  add query
if(isset($_POST['insert_btn'])){
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $name."-".date("Y-m-d")."-".".".$extension ;
    $path = "../images/brand_image/".$new_name;
   

    if(move_uploaded_file($temp_name, $path)){
        if($name  && $image){
            $insert_query = "INSERT INTO brands (name,image) VALUES ('$name','$new_name')";
            mysqli_query($db_connect,$insert_query);
            $_SESSION['brand_success'] = "Your Brand added successfully";
            header("location: brands.php");
    
        }else{
            $_SESSION['brand_error'] = "You have to fill all information.";
            header("location: brand_add.php");
        }
    
       }
}


// skill delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM brands WHERE id='$id'";
    mysqli_query($db_connect, $delete_query);
    $_SESSION['skills_delete'] = "Your Brand Deleted successfully";
    header("location: brands.php");
}

// skill update operation

if(isset($_POST['update_btn'])){
    $id = $_POST['brand_id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $explode = explode(".",$image);
    $extension = end($explode);
    $new_name = $id.$name."-".date("Y-m-d")."-".".".$extension ;
    $path = "../images/brand_image/".$new_name;
   


        // getting single image for replace that image 
        $select_data ="SELECT * FROM brands WHERE id='$id'";
        $connect=mysqli_query($db_connect,$select_data);
        $single_data = mysqli_fetch_assoc($connect);
        $db_image= $single_data['image'];
        $db_path = "../images/brand_image/".$db_image;
  
        
  if($image){
    if(move_uploaded_file($temp_name, $path )){
        unlink($db_path);
        $update_query = "UPDATE brands SET image='$new_name' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['brand_update_success'] = "Your Brand Updated successfully";
        header("location: brands.php");

    }
  }
   
      
 


      

 


}


?>