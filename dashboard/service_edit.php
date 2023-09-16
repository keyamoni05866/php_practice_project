<?php
include('./extends/header.php');
include('./icons.php');
include('../config/db.php');

$id = $_GET['edit_id'];
$select_query = "SELECT * FROM services WHERE id='$id'";
$connect = mysqli_query($db_connect, $select_query);
$service = mysqli_fetch_assoc($connect);

?>





<!-- error for field -->






<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service Update</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Update Your Service</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="service_post.php" method="POST">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Service Title</label>
                        <input type="text" class="form-control" name="title" value="<?= $service['title'] ?>">
                        <input type="text" hidden  name="service_id" value="<?= $service['id'] ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Service Icon</label>
                        <input type="text" class="form-control" name="icon" id="showThat" value="<?= $service['icon']  ?>">

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
     <textarea class="form-control" name="description" id="" cols="30" rows="10" value=""> <?= $service['description'] ?></textarea>
                    </div>


                    <div class="col-8">
                        <button type="submit" class="btn btn-info btn-lg ms-1" name="update_btn">Update</button>
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