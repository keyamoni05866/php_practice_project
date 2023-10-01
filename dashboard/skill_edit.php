<?php
include('./extends/header.php');
include('../config/db.php');

$id = $_GET['edit_id'];
$select_query = "SELECT * FROM skills WHERE id='$id'";
$connect = mysqli_query($db_connect, $select_query);
$skill = mysqli_fetch_assoc($connect);
?>





<!-- error for field -->


<?php if (isset($_SESSION['skill_update_error'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
        <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
        <div class="alert-content">
            <span class="alert-title"></span>
            <span class="alert-text"><?= $_SESSION['skill_update_error']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['skill_update_error']) ?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Skill Update</h1>
        </div>
    </div>
</div>



<div class="row ">
<div class="col-6 mx-auto">

<div class="card" style="height: 360px;">
  <div class="card-header">
    <h2 class="fs-3 text-center mt-3">Update Your Skill</h2>
  </div>
  <form action="skill_post.php" method="POST">
    <div class="card-body">
      <label for="exampleInputEmail1" class="form-label ms-2 fs-6">Skill Name:</label>
      <input type="text" class="form-control form-control-rounded" aria-describedby="..." placeholder="Name of Your Skill"name="skill" value="<?= $skill['skill']?>">
      <input hidden type="text" class="form-control form-control-rounded" aria-describedby="..." placeholder="Name of Your Skill"name="skill_id" value="<?= $skill['id']?>">

      <label for="exampleInputEmail1" class="form-label fs-6 ms-2 mt-3">Years of skill acquisition:</label>
      <input type="text" class="form-control form-control-rounded" aria-describedby="..." placeholder="Give the date you acquired your skills " name="year" value="<?= $skill['year']?>">
      
      <button class="btn btn-info  mt-4 ms-2 px-5 py-2 text-white" name="update_btn">Update</button>
    </div>
  </form>
</div>

</div>
</div>





<?php
include('./extends/footer.php')

?>