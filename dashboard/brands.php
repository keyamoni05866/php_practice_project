<?php
include('./extends/header.php');
include('../config/db.php');


$select_brand = "SELECT * FROM brands";
$brands = mysqli_query($db_connect, $select_brand);
$single_data= mysqli_fetch_assoc($brands);
$num = 0;
?>


<!--  success -->
<?php if (isset($_SESSION['brand_success'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
        <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">Congratulations,</span>
            <span class="alert-text"><?= $_SESSION['brand_success']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['brand_success']) ?>


<!-- portfolio  delete -->
<?php if (isset($_SESSION['delete_item'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"></span>
        <span class="alert-text"><?= $_SESSION['delete_item']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['delete_item']) ?>


<!--  updated success -->

<?php if (isset($_SESSION['brand_update_success'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Congratulations,</span>
        <span class="alert-text"><?= $_SESSION['brand_update_success']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['brand_update_success']) ?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brand Show</h1>
        </div>
    </div>
</div>






<div class="row mt-3">
    <div class="col-12 ">

        <div class="card">
            <div class="card-header">
                <h3 class="text-uppercase">Brands List.</h3>
            </div>
        </div>

        <table class="table table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="">Serial</th>
                    <th scope="">Image</th>
                    <th scope="">Name</th>
                  
                    <th scope="">Action</th>
                    <th scope=""></th>

                </tr>
            </thead>
            <tbody>
                <?php if($single_data):?>
         
                <?php foreach ($brands as $brand) : ?>
                    <tr>
                        <th scope="row"><?= ++$num ?></th>
                   <td>
                    <img src="../images/brand_image/<?= $brand['image'] ?>" alt="" style="height:80px; width:80px; border-radius:50%;">
                     
                    </td>
                        <td><?= $brand['name'] ?></td>
                       
      


                        <td>
                            <a href="brand_update.php?edit_id=<?= $brand['id'] ?>" class="btn btn-info btn-sm">EDIT</a>
                            
                        </td>
                        <td><a href="brand_post.php?delete_id=<?= $brand['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
                    </tr>
                <?php endforeach; ?>

              <?php else:?>
                <tr>
                 <td colspan="6" class="text-center text-danger">
                                    <h2>No Data Found!</h2>
                                </td>
                            </tr>
                    <?php endif; ?>
                   
            </tbody>
        </table>
    </div>
</div>



<?php
include('./extends/footer.php')

?>

