<?php
include('./extends/header.php');
include('../config/db.php');


$select_about = "SELECT * FROM about";
$abouts = mysqli_query($db_connect, $select_about);

$single_data = mysqli_fetch_assoc($abouts);
$num = 0;
?>


<!-- about success -->
<?php if (isset($_SESSION['about_success'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
        <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">Congratulations,</span>
            <span class="alert-text"><?= $_SESSION['about_success']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['about_success']) ?>


<!-- portfolio  delete -->
<?php if (isset($_SESSION['about_delete'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"></span>
        <span class="alert-text"><?= $_SESSION['about_delete']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['about_delete']) ?>


<!-- about updated success -->

<?php if (isset($_SESSION['about_success'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Congratulations,</span>
        <span class="alert-text"><?= $_SESSION['about_success']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['about_success']) ?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>About Details</h1>
        </div>
    </div>
</div>






<div class="row mt-3">
    <div class="col-12 " >

        <div class="card">
            <div class="card-header">
                <h3 class="text-uppercase text-center">About Details.</h3>
            </div>
        </div>

    
        </div>
        </div>
        <div class="row">
            <?php if($single_data ):?>
  <?php foreach($abouts as $about):?>
   <div class="col">
    <div class="card position-relative" style="width: 33rem; height:570px">
       <img src="../images/about_image/<?= $about['image'] ?>" class="rounded" alt="..." style="height:230px">
       <div class="card-body">
      <h6 class="fs-5 ">Profession: <?=$about['profession']?></h6>
  
  
    <h6>G-Mail: <?= $about['gmail']?></h6>
    <h6>Phone: <?= $about['phone']?></h6>
    <h6>Address: <?= $about['address']?></h6>

    <div>
        <h6>Social-Link:
        <a href="<?= $about['facebook']?>" target="_blank" class="me-3 ms-3"><button class="btn btn-outline-info btn-sm ">facebook</button></a>
        <a href="<?= $about['linkedin']?>" target="_blank"><button class="btn btn-outline-dark btn-sm ">linkedin</button></a>
        </h6>
    </div>
    <p>Description: <?= $about['description']?></p>


    <div class=" position-absolute top-90 bottom-0 mb-3 " >
    <?php if ($about['status'] == 'active') : ?>
        <a href="about_post.php?change_status=<?= $about['id'] ?>" class="btn btn-success text-uppercase  me-5"><?= $about['status'] ?></a>
            <?php else : ?>
            <a href="about_post.php?change_status=<?= $about['id'] ?>" class="btn btn-dark text-uppercase   me-5"><?= $about['status'] ?></a>
            <?php endif; ?>
    <a href="about_update.php?edit_id=<?= $about['id'] ?>" class="btn btn-info me-5">EDIT</a>
    <a href="about_post.php?delete_id=<?= $about['id'] ?>" class="btn btn-danger ">DELETE</a>
      
    </div>


</div>
</div>
</div>
    <?php endforeach;?>
    <?php else: ?>
                           
                                
                                    <h2  class="text-center text-danger">No Data Found!</h2>
                              
                            
                            <?php endif;?>
    
    




<?php
include('./extends/footer.php')

?>

