<?php
include('./extends/header.php');
// include('./icons.php');
include('../config/db.php');

$id = $_GET['edit_id'];
$select_query = "SELECT * FROM portfolios WHERE id='$id'";
$connect = mysqli_query($db_connect, $select_query);
$portfolio = mysqli_fetch_assoc($connect);

?>





<!-- error for field -->


<?php if (isset($_SESSION['portfolio_update_error'])) : ?>



<div class="alert alert-custom " role="alert" style="width: 25%; height: 25%;  float:right;">
    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
    <div class="alert-content">
        <span class="alert-title"></span>
        <span class="alert-text"><?= $_SESSION['portfolio_update_error']; ?></span>
    </div>
</div>
<?php endif;
unset($_SESSION['portfolio_update_error']) ?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio Update</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Update Your Portfolio</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Portfolio Title</label>
                        <input type="text" class="form-control" name="title" value="<?= $portfolio['title']?>"> 
                        <input type="text" hidden  name="portfolio_id" value="<?= $portfolio['id'] ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Portfolio Image</label>
                        <!-- <img style=" height:100px; width:100px; margin-bottom:10px; border-radius:30%;" src="../images/portfolio_image/<?= $portfolio['image']?>"> -->
                        <input type="file" class="form-control" name="image"> 
                       

                      
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Portfolio Description</label>
<textarea class="form-control" name="description" id="" cols="30" rows="10"><?= $portfolio['description']?></textarea>
                    </div>


                    <div class="col-8">
                        <button type="submit" class="btn btn-info btn-lg ms-1" name="update_btn">Update</button>
                    </div>



            </div>
        </div>

        </form>
    </div>
</div>





<?php
include('./extends/footer.php')

?>