<?php
include('./extends/header.php');
include('../config/db.php');
$id = $_GET['edit_id'];
$select_about = "SELECT * FROM about WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_about);
$about = mysqli_fetch_assoc($connect);
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
            <h1>About Add</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Please Inform Us About Yourself</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="about_post.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Profession Title</label>
                        <input type="text" class="form-control" name="profession" value="<?= $about['profession']?>">
                        <input type="text" class="form-control" hidden name="about_id" value="<?= $about['id']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Your Image</label>
                        <input type="file" class="form-control" name="image" value="<?= $about['image']?>">
                    </div>
                 
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Your Facebook Link</label>
                        <input type="text" class="form-control" name="facebook" value="<?= $about['facebook']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Your Linkedin LInk</label>
                        <input type="text" class="form-control" name="linkedin" value="<?= $about['linkedin']?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Your Gmail</label>
                        <input type="email" class="form-control" name="gmail" value="<?= $about['gmail']?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Your Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="<?= $about['phone']?>">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Your Address</label>
                        <input type="text" class="form-control" name="address" value="<?= $about['address']?>">
                    </div>
                 

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Describe Yourself</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10" ><?= $about['description']?></textarea>
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