<?php
include('./extends/header.php');


?>

<?php if (isset($_SESSION['name_update_success'])) : ?>


  <div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
      <span class="alert-title"></span>
      <span class="alert-text"><?= $_SESSION['name_update_success']; ?></span>
    </div>
  </div>
<?php endif;
unset($_SESSION['name_update_success']) ?>


<?php if (isset($_SESSION['email_update_success'])) : ?>


  <div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
      <span class="alert-title"></span>
      <span class="alert-text"><?= $_SESSION['email_update_success']; ?></span>
    </div>
  </div>
<?php endif;
unset($_SESSION['email_update_success']) ?>

<?php if (isset($_SESSION['password_success'])) : ?>


<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
  <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
  <div class="alert-content">
    <span class="alert-title"></span>
    <span class="alert-text"><?= $_SESSION['password_success']; ?></span>
  </div>
</div>
<?php endif;
unset($_SESSION['password_success']) ?>

<?php if (isset($_SESSION['current_confirm_pass_error'])) : ?>


<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
  <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
  <div class="alert-content">
    <span class="alert-title"></span>
    <span class="alert-text"><?= $_SESSION['current_confirm_pass_error']; ?></span>
  </div>
</div>
<?php endif;
unset($_SESSION['current_confirm_pass_error']) ?>

<div class="row">
  <div class="col">
    <div class="page-description">
      <h1>Your Profile</h1>
    </div>
  </div>
</div>

<div class="row">

  <div class="col">

    <div class="card" style="height: 360px;">
      <div class="card-header">
        <h2 class="fs-3 text-center mt-3">Name Update</h2>
      </div>
      <form action="profile_update.php" method="POST">
        <div class="card-body">
          <label for="exampleInputEmail1" class="form-label ms-2 fs-6">Old Name:</label>
          <input type="text" class="form-control form-control-rounded" aria-describedby="..." placeholder="" value="<?= $_SESSION['admin_name'] ?>">

          <label for="exampleInputEmail1" class="form-label fs-6 ms-2 mt-3">New Name:</label>
          <input type="text" class="form-control form-control-rounded" aria-describedby="..." placeholder="Enter Your New Name" name="name">
          <?php if (isset($_SESSION['name_error'])) : ?>
            <div id="emailHelp" class="form-text text-danger ms-2 fs-6"><?= $_SESSION['name_error'] ?> </div>
          <?php endif;
          unset($_SESSION['name_error']); ?>
          <button class="btn btn-info  mt-4 ms-3 text-white" name="name_update">Update</button>
        </div>
      </form>
    </div>

  </div>

  <!-- email update section is here -->
  <div class="col">

    <form action="profile_update.php" method="POST">
      <div class="card" style="height: 360px;">
        <div class="card-header ">
          <h2 class="fs-3 text-center mt-3">Email Update</h2>
        </div>
        <div class="card-body">
          <label for="exampleInputEmail1" class="form-label ms-2 mt-2 fs-6">Old Email:</label>
          <input type="email" class="form-control form-control-rounded" aria-describedby="..." value="<?= $_SESSION['admin_email'] ?>">

          <label for="exampleInputEmail1" class="form-label fs-6 ms-2 mt-4">New Email:</label>
          <input type="email" class="form-control form-control-rounded" aria-describedby="..." placeholder="Enter Your New Email" name="email">


          <?php if (isset($_SESSION['email_error'])) : ?>
            <div id="emailHelp" class="form-text text-danger ms-2 fs-6"><?= $_SESSION['email_error'] ?> </div>
          <?php endif;
          unset($_SESSION['email_error']); ?>
          <button class="btn btn-info  mt-4 ms-3 text-white" name="email_update">Update</button>
        </div>
      </div>
    </form>

  </div>
</div>


<!-- password update is here -->
<div class="col-6">

  <form action="profile_update.php" method="POST">
    <div class="card">
<!--      
    <?php if (isset($_SESSION['password_success'])) : ?>


<div class="alert alert-custom mt-5 mx-3" role="alert" >
  <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
  <div class="alert-content">
    <span class="alert-title">Congratulations,</span>
    <span class="alert-text"><?= $_SESSION['password_success']; ?></span>
  </div>
</div>
<?php endif;
unset($_SESSION['password_success']) ?> -->

      <div class="card-header ">
        <h2 class="fs-3 text-center mt-3">Password Update</h2>
      </div>
      <div class="card-body">
        <label for="exampleInputEmail1" class="form-label ms-2 mt-2 fs-6">Current Password:</label>
        <input type="password" class="form-control form-control-rounded" aria-describedby="..." placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="current_password">
        <?php if (isset($_SESSION['password_error'])) : ?>
        <div id="emailHelp" class="form-text text-danger ms-2 fs-6"><?= $_SESSION['password_error'] ?> </div>
        <?php endif;
          unset($_SESSION['password_error']); ?> 

        <label for="exampleInputEmail1" class="form-label fs-6 ms-2 mt-4">New Password:</label>
        <input type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control form-control-rounded" aria-describedby="..." name="new_password">

        <?php if (isset($_SESSION['new_password_error'])) : ?>
        <div id="emailHelp" class="form-text text-danger ms-2 fs-6"><?= $_SESSION['new_password_error'] ?> </div>
        <?php endif;
          unset($_SESSION['new_password_error']); ?> 
       
        <label for="exampleInputEmail1" class="form-label fs-6 ms-2 mt-4">Confirm Password:</label>
        <input type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control form-control-rounded" aria-describedby="..." name="confirm_password">

        <?php if (isset($_SESSION['confirm_password_error'])) : ?>
        <div id="emailHelp" class="form-text text-danger ms-2 fs-6"><?= $_SESSION['confirm_password_error'] ?> </div>
        <?php endif;
          unset($_SESSION['confirm_password_error']); ?> 

        
      
        <button class="btn btn-info  mt-4 ms-3 text-white" name="password_update">Update</button>
      </div>
    </div>
  </form>

</div>
<?php
include('./extends/footer.php');
?>