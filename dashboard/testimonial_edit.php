<?php
include('./extends/header.php');
// include('./icons.php');
include('../config/db.php');

$id = $_GET['edit_id'];
$select_query = "SELECT * FROM testimonial WHERE id='$id'";
$connect = mysqli_query($db_connect, $select_query);
$testimonial = mysqli_fetch_assoc($connect);

?>





<!-- error for field -->


<?php if (isset($_SESSION['testimonial_update_error'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
    <div class="alert-content">
        <span class="alert-title"></span>
        <span class="alert-text"><?= $_SESSION['testimonial_update_error']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['testimonial_update_error']) ?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial Update</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Update Your Feedback</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="testimonial_post.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Your Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $testimonial['name']?>">
                        <input hidden type="text" class="form-control" name="testimonial_id" value="<?= $testimonial['id']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Your Profession</label>
                        <input type="text" class="form-control" name="profession" value="<?= $testimonial['profession']?>">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Your Image</label>
                        <input type="file" class="form-control" name="image" >

                      
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Testimonial Message</label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="10"><?= $testimonial['message']?></textarea>
                    </div>


                    <div class="col-8">
                        <button type="submit" class="btn btn-info btn-lg ms-1" name="update_btn">Update</button>
                    </div>

                </form>

            </div>
        </div>

        </form>
    </div>
</div>





<?php
include('./extends/footer.php')

?>