<?php
include('./extends/header.php');
include('../config/db.php');


$select_service = "SELECT * FROM services ";
$services = mysqli_query($db_connect, $select_service);
$num = 0;
?>


<!-- service success -->
<?php if (isset($_SESSION['service_success'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
        <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">Congratulations,</span>
            <span class="alert-text"><?= $_SESSION['service_success']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['service_success']) ?>


<!-- service  delete -->
<?php if (isset($_SESSION['service_delete'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"></span>
        <span class="alert-text"><?= $_SESSION['service_delete']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['service_delete']) ?>


<!-- service updated success -->

<?php if (isset($_SESSION['service_update_success'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Congratulations,</span>
        <span class="alert-text"><?= $_SESSION['service_update_success']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['service_update_success']) ?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service Show</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-container bg-dark">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>




<div class="row mt-3">
    <div class="col-12 ">

        <div class="card">
            <div class="card-header">
                <h3 class="text-uppercase">Services List.</h3>
            </div>
        </div>

        <table class="table table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="">Serial</th>
                    <th scope="">Icon</th>
                    <th scope="">Title</th>
                    <th scope="">Description</th>
                    <th scope="">Status</th>
                    <th scope="">Action</th>
                    <th scope=""></th>

                </tr>
            </thead>
            <tbody>
         
                <?php foreach ($services as $service) : ?>
                    <tr>
                        <th scope="row"><?= ++$num ?></th>
                        <td><?= $service['icon'] ?></td>
                        <td><?= $service['title'] ?></td>
                        <td><?= $service['description'] ?></td>
                        <td>
                            <?php if ($service['status'] == 'active') : ?>
                                <button class="btn btn-success text-uppercase btn-sm"><?= $service['status'] ?></button>
                            <?php else : ?>
                                <button class="btn btn-dark text-uppercase btn-sm"><?= $service['status'] ?></button>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="service_edit.php?edit_id=<?= $service['id'] ?>" class="btn btn-info btn-sm">EDIT</a>
                            
                        </td>
                        <td><a href="service_post.php?delete_id=<?= $service['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
                    </tr>
                <?php endforeach; ?>

              
                   
            </tbody>
        </table>
    </div>
</div>



<?php
include('./extends/footer.php')

?>

<!--  -->