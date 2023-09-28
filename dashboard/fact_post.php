<?php


session_start();
include('../config/db.php');


// facts add query
if(isset($_POST['insert_btn'])){
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $number = $_POST['number'];

    if($name && $icon &&  $number){
          $insert_facts = "INSERT INTO facts (name,number,icon) VALUES ('$name','$number','$icon')";
          mysqli_query($db_connect,$insert_facts );
          $_SESSION['facts_success'] = "Your facts added successfully";
          header("location: facts.php");
    }else{
        $_SESSION['facts_error'] = "You have to fill all information.";
        header("location: fact_add.php");
    }
}


// facts delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM facts WHERE id='$id'";
    mysqli_query($db_connect, $delete_query);
    $_SESSION['facts_delete'] = "Your facts Deleted successfully";
    header("location: facts.php");
}

// service update operation

if(isset($_POST['update_btn'])){
    $id = $_POST['fact_id'];
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $number = $_POST['number'];
   
      

    if($name && $icon && $number){
        $update_facts = "UPDATE facts SET name='$name',number='$number',icon='$icon' WHERE id='$id'";
        mysqli_query($db_connect, $update_facts);
        $_SESSION['fact_update_success'] = " Updated successfully";
        header("location: facts.php");
  }else{
      $_SESSION['fact_update_error'] = "You have to fill all information.";
      header("location: fact_edit.php");
  }

}

// change status code

if(isset($_GET['change_status'])){

    $id= $_GET['change_status'];

      $select_status = "SELECT * FROM facts WHERE id='$id'";
      $connect=  mysqli_query($db_connect,$select_status);
      $specific_element = mysqli_fetch_assoc($connect);
     
      $get_status = $specific_element['status'];

     
    if($get_status == 'deactive'){
             $update_query = "UPDATE facts SET status='active' WHERE id='$id'";
             mysqli_query($db_connect,$update_query);
             header("location: facts.php");
    }else{
            $update = "UPDATE facts SET status='deactive' WHERE id='$id'";
            mysqli_query($db_connect,$update);
            header("location: facts.php");
    }
}
?>