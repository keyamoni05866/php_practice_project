<?php
include('./extends/header.php');

?>





<!-- error for field -->


<?php if (isset($_SESSION['testimonial_error'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
        <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
        <div class="alert-content">
            <span class="alert-title"></span>
            <span class="alert-text"><?= $_SESSION['testimonial_error']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['testimonial_error']) ?>

<?php if (isset($_SESSION['testimonial_success'])) : ?>



    <div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
        <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
        <div class="alert-content">
            <span class="alert-title"></span>
            <span class="alert-text"><?= $_SESSION['testimonial_success']; ?></span>
        </div>
    </div>
<?php endif;
unset($_SESSION['testimonial_success']) ?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial Add</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Your Feedback</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="testimonial_post.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Your Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Your Profession</label>
                        <input type="text" class="form-control" name="profession">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Your Image</label>
                        <input type="file" class="form-control" name="image">

                      
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Testimonial Message</label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                    </div>


                    <div class="col-8">
                        <button type="submit" class="btn btn-info btn-lg ms-1" name="insert_btn">ADD</button>
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