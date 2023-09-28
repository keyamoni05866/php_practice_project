<?php
include('./extends/header.php');
include('./icons.php');
include('../config/db.php');
 
$id = $_GET['edit_id'];
$select_facts = "SELECT * FROM facts WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_facts);
$facts = mysqli_fetch_assoc($connect);

?>





<!-- error for field -->


<?php if (isset($_SESSION['fact_update_error'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
        <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
        <div class="alert-content">
            <span class="alert-title"></span>
            <span class="alert-text"><?= $_SESSION['fact_update_error']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['fact_update_error']) ?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit Your Facts</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Your Facts</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="fact_post.php" method="POST">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Facts Name</label>
                        <input type="text" class="form-control" name="name" value="<?=$facts['name']?>">
                        <input hidden type="text" class="form-control" name="fact_id" value="<?=$facts['id']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Number of your Facts</label>
                        <input type="text" class="form-control" name="number" value="<?=$facts['number']?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Facts Icon</label>
                        <input type="text" class="form-control" name="icon" id="showThat" value="<?=$facts['icon']?>">

                        <div class="card mt-4">
                            <div class="card-body" style="overflow-y: scroll; height:80px;">
                                <?php foreach ($icons as $icon) : ?>
                                    <i onclick="myFunc(event)" class="<?= $icon ?>" style="font-size: 20px;"></i>
                                <?php endforeach; ?>

                                <script>
                                    let field = document.getElementById('showThat');

                                    function myFunc() {
                                        field.value = event.target.getAttribute('class');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                   


                    <div class="col-8">
                        <button type="submit" class="btn btn-info btn-lg ms-1" name="update_btn">Edit</button>
                    </div>



            </div>
        </div>

        </form>
    </div>
</div>
</div>
</div>



<?php
include('./extends/footer.php')

?>