<?php
include('./extends/header.php');
include('./icons.php');
?>





<!-- error for field -->


<?php if (isset($_SESSION['service_error'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
        <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
        <div class="alert-content">
            <span class="alert-title"></span>
            <span class="alert-text"><?= $_SESSION['service_error']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['service_error']) ?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service Add</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Your Service</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="service_post.php" method="POST">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Service Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Service Icon</label>
                        <input type="text" class="form-control" name="icon" id="showThat">

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

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Service Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                    </div>


                    <div class="col-8">
                        <button type="submit" class="btn btn-info btn-lg ms-1" name="insert_btn">ADD</button>
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