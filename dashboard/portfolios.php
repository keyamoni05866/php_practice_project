<?php
include('./extends/header.php');
include('../config/db.php');


$select_portfolio = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db_connect, $select_portfolio);
$num = 0;
?>


<!-- portfolios success -->
<?php if (isset($_SESSION['portfolio_success'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
        <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">Congratulations,</span>
            <span class="alert-text"><?= $_SESSION['portfolio_success']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['portfolio_success']) ?>


<!-- service  delete -->
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


<!-- service updated success -->

<?php if (isset($_SESSION['portfolio_update_success'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Congratulations,</span>
        <span class="alert-text"><?= $_SESSION['portfolio_update_success']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['portfolio_update_success']) ?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio Show</h1>
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
                <h3 class="text-uppercase">Portfolio List.</h3>
            </div>
        </div>

        <table class="table table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="">Serial</th>
                    <th scope="">Image</th>
                    <th scope="">Title</th>
                    <th scope="">Description</th>
                    <th scope="">Status</th>
                    <th scope="">Action</th>
                    <th scope=""></th>

                </tr>
            </thead>
            <tbody>
         
                <?php foreach ($portfolios as $portfolio) : ?>
                    <tr>
                        <th scope="row"><?= ++$num ?></th>
                   <td>
                    <img src="../images/portfolio_image/<?= $portfolio['image'] ?>" alt="" style="height:80px; width:80px; border-radius:50%;">
                     
                    </td>
                        <td><?= $portfolio['title'] ?></td>
                        <td><?= $portfolio['description'] ?></td>
                        <td>


            <?php if ($portfolio['status'] == 'active') : ?>
            <a href="portfolio_post.php?change_status=<?= $portfolio['id'] ?>" class="btn btn-success text-uppercase btn-sm"><?= $portfolio['status'] ?></a>
            <?php else : ?>
            <a href="portfolio_post.php?change_status=<?= $portfolio['id'] ?>" class="btn btn-dark text-uppercase btn-sm"><?= $portfolio['status'] ?></a>
            <?php endif; ?>

                        </td>


                        <td>
                            <a href="portfolio_update.php?edit_id=<?= $portfolio['id'] ?>" class="btn btn-info btn-sm">EDIT</a>
                            
                        </td>
                        <td><a href="portfolio_post.php?delete_id=<?= $portfolio['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
                    </tr>
                <?php endforeach; ?>

              
                   
            </tbody>
        </table>
    </div>
</div>



<?php
include('./extends/footer.php')

?>

