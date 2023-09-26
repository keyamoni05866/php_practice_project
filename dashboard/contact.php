<?php
include('./extends/header.php');
include('../config/db.php');


$select_contact = "SELECT * FROM contact";
$contacts = mysqli_query($db_connect, $select_contact);
$num = 0;
?>






<!-- contact delete -->
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



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Contact Show</h1>
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
                <h3 class="text-uppercase">Contact List.</h3>
            </div>
        </div>

        <table class="table table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="">#</th>
                    <th scope="">Name</th>
                    <th scope="">Email</th>
                    <th scope="">Subject</th>
                    <th scope="">Message</th>
                    <th scope="">Date</th>
                    <th scope="">Action</th>
                    

                </tr>
            </thead>
            <tbody>
         
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <th scope="row"><?= ++$num ?></th>
                   <td>
                   <?= $contact['name'] ?>
                     
                    </td>
                        <td><?= $contact['email'] ?></td>
                        <td><?= $contact['subject'] ?></td>
                        <td>
                        <?= $contact['message'] ?>

      

                        </td>
                        <td>
                        <?= $contact['date'] ?>

      

                        </td>


                       
                        <td><a href="contact_post.php?delete_id=<?= $contact['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
                    </tr>
                <?php endforeach; ?>

              
                   
            </tbody>
        </table>
    </div>
</div>



<?php
include('./extends/footer.php')

?>

