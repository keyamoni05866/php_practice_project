<?php
include('./extends/header.php');
include('../config/db.php');


$select_fact = "SELECT * FROM facts";
$facts= mysqli_query($db_connect, $select_fact);

$single_data = mysqli_fetch_assoc($facts);
$num = 0;
?>


<!-- facts success -->
<?php if (isset($_SESSION['facts_success'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
        <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">Congratulations,</span>
            <span class="alert-text"><?= $_SESSION['facts_success']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['facts_success']) ?>


<!-- facts  delete -->
<?php if (isset($_SESSION['facts_delete'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"></span>
        <span class="alert-text"><?= $_SESSION['facts_delete']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['facts_delete']) ?>


<!-- facts updated success -->

<?php if (isset($_SESSION['fact_update_success'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Congratulations,</span>
        <span class="alert-text"><?= $_SESSION['fact_update_success']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['fact_update_success']) ?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Facts </h1>
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
                <h3 class="text-uppercase">Facts List.</h3>
            </div>
        </div>

        <table class="table table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="">Serial</th>
                    <th scope="">Icon</th>
                    <th scope="">Title</th>
                    <th scope="">number</th>
                    <th scope="">Status</th>
                    <th scope="">Action</th>
                    <th scope=""></th>

                </tr>
            </thead>
            <tbody>
         <?php if($single_data):?>
                <?php foreach ($facts as $fact) : ?>
                    <tr>
                        <th scope="row"><?= ++$num ?></th>
                   <td>
                    <?= $fact['icon']?>
                     
                    </td>
                        <td><?= $fact['name']?></td>
                        <td><?= $fact['number']?></td>
                        <td>


            <?php if ($fact['status'] == 'active') : ?>
            <a href="fact_post.php?change_status=<?= $fact['id'] ?>" class="btn btn-success text-uppercase btn-sm"><?= $fact['status'] ?></a>
            <?php else : ?>
            <a href="fact_post.php?change_status=<?= $fact['id'] ?>" class="btn btn-dark text-uppercase btn-sm"><?= $fact['status'] ?></a>
            <?php endif; ?>

                        </td>


                        <td>
                            <a href="facts_edit.php?edit_id=<?= $fact['id'] ?>" class="btn btn-info btn-sm">EDIT</a>
                            
                        </td>
                        <td><a href="fact_post.php?delete_id=<?= $fact['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
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

