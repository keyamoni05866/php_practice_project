<?php


session_start();
include('../config/db.php');


// service add query
if(isset($_POST['insert_btn'])){
    $skill = $_POST['skill'];
    $year = $_POST['year'];
   

    if($skill && $year ){
          $insert_skill = "INSERT INTO skills (skill,year) VALUES ('$skill ','$year')";
          mysqli_query($db_connect,  $insert_skill);
          $_SESSION['skill_success'] = "Your Skill added successfully";
          header("location: skills.php");
    }else{
        $_SESSION['skill_error'] = "You have to fill all information.";
        header("location: skill_add.php");
    }
}


// skill delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM skills WHERE id='$id'";
    mysqli_query($db_connect, $delete_query);
    $_SESSION['skills_delete'] = "Your Skill Deleted successfully";
    header("location: skills.php");
}

// skill update operation

if(isset($_POST['update_btn'])){
    $skill = $_POST['skill'];
    $year = $_POST['year'];
    $id = $_POST['skill_id'];
      

    if($skill && $year ){
        $update_skills = "UPDATE skills SET skill='$skill',year='$year' WHERE id='$id'";
        mysqli_query($db_connect,  $update_skills);
        $_SESSION['skill_update_success'] = "Your Skill Updated successfully";
        header("location: skills.php");
  }else{
      $_SESSION['skill_update_error'] = "You have to fill all information.";
      header("location: skill_edit.php");
  }

}

// change status code

if(isset($_GET['change_status'])){

    $id= $_GET['change_status'];

      $select_status = "SELECT * FROM skills WHERE id='$id'";
      $connect=  mysqli_query($db_connect,$select_status);
      $specif_element = mysqli_fetch_assoc($connect);
     
      $get_status = $specif_element['status'];

     
    if($get_status == 'deactive'){
             $update_query = "UPDATE skills SET status='active' WHERE id='$id'";
             mysqli_query($db_connect,$update_query);
             header("location: skills.php");
    }else{
            $update = "UPDATE skills SET status='deactive' WHERE id='$id'";
            mysqli_query($db_connect,$update);
            header("location: skills.php");
    }
}
?>