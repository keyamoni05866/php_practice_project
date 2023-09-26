<?php
session_start();
include('../config/db.php');


// delete operation

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM contact WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['delete_item'] = "contact deleted successfully";
    header("location: contact.php");
}

?>