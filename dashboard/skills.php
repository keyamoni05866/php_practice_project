<?php
include('./extends/header.php');
include('../config/db.php');


$select_skill = "SELECT * FROM skills ";
$skills = mysqli_query($db_connect, $select_skill);
$single_data = mysqli_fetch_assoc($skills);
$num = 0;
?>


<!-- service success -->
<?php if (isset($_SESSION['skill_success'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%;  float:right;">
        <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
        <div class="alert-content">
            <span class="alert-title">Congratulations,</span>
            <span class="alert-text"><?= $_SESSION['skill_success']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['skill_success']) ?>


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


<!-- skill updated success -->

<?php if (isset($_SESSION['skill_update_success'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Congratulations,</span>
        <span class="alert-text"><?= $_SESSION['skill_update_success']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['skill_update_success']) ?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Skill List</h1>
        </div>
    </div>
</div>






<div class="row mt-3">
    <div class="col-12 ">

        <div class="card">
            <div class="card-header">
                <h3 class="text-uppercase">Skill List.</h3>
            </div>
        </div>

        <table class="table table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="">Serial</th>
                    <th scope="">Skill Name</th>
                    <th scope="">Year</th>
                    <th scope="">Status</th>
                    <th scope="">Action</th>
                    <th scope=""></th>

                </tr>
            </thead>
            <tbody>
         <?php if($single_data):?>
                <?php foreach ($skills as $skill) : ?>
                    <tr>
                        <th scope="row"><?= ++$num ?></th>
                        <td><?= $skill['skill'] ?></td>
                        <td><?= $skill['year'] ?></td>
                       
                        <td>


            <?php if ($skill['status'] == 'active') : ?>
            <a href="skill_post.php?change_status=<?= $skill['id'] ?>" class="btn btn-success text-uppercase btn-sm"><?= $skill['status'] ?></a>
            <?php else : ?>
            <a href="skill_post.php?change_status=<?= $skill['id'] ?>" class="btn btn-dark text-uppercase btn-sm"><?= $skill['status'] ?></a>
            <?php endif; ?>

                        </td>


                        <td>
                            <a href="skill_edit.php?edit_id=<?= $skill['id'] ?>" class="btn btn-info btn-sm">EDIT</a>
                            
                        </td>
                        <td><a href="skill_post.php?delete_id=<?= $skill['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
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

