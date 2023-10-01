<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header("location: error_page.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Theme Styles -->
    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online ">
                    <a href="#">
                        <!-- <span class="activity-indicator"> </span> -->


                        <span class="user-info-text"><?= $_SESSION['admin_name'] ?><br><span class="user-state-info"><?= $_SESSION['admin_email'] ?></span></span>





                    </a>

                </div>

            </div>

            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active-page' : ' '; ?>">
                        <a href="home.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active-page' : ' '; ?>">
                        <a href="profile.php" class="active"><i class="material-icons-two-tone">account_circle</i>Profile</a>
                    </li>
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active-page' : ' '; ?>">
                        <a href="contact.php" class="active"><i class="material-icons-two-tone">import_contacts</i>Contact</a>
                    </li>
                    <li class="">
                        <a href= "http://localhost/kufa/index.php" class="active"><i class="material-icons-two-tone">home</i>Website</a>
                    </li>

                   
                

                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active-page' : ' '; ?>">
                        <a href="services.php"><i class="material-icons-two-tone">support_agent</i>Service<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="services.php">Services Show</a>
                            </li>
                            <li>
                                <a href="service_add.php">Services ADD</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'portfolios.php' ? 'active-page' : ' '; ?>">
             <a href="portfolios.php"><i class="material-icons-two-tone">folder</i>Portfolios<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="portfolios.php">Portfolios Show</a>
                            </li>
                            <li>
                                <a href="portfolio_add.php">Portfolios ADD</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'testimonial.php' ? 'active-page' : ' '; ?>">
             <a href="testimonial.php"><i class="material-icons-two-tone">chat</i>Testimonial<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="testimonial.php">Testimonial Show</a>
                            </li>
                            <li>
                                <a href="testimonial_add.php">Testimonial ADD</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'facts.php' ? 'active-page' : ' '; ?>">
             <a href="facts.php"><i class="material-icons-two-tone">fact_check</i>Facts<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="facts.php">Facts Show</a>
                            </li>
                            <li>
                                <a href="fact_add.php">Facts ADD</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active-page' : ' '; ?>">
             <a href="facts.php"><i class="material-icons-two-tone">school</i>About<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="about.php">About Details</a>
                            </li>
                            <li>
                                <a href="about_add.php">Add About Yourself</a>
                            </li>
                            <li>
                                <a href="skills.php">Skills List</a>
                            </li>
                            <li>
                                <a href="skill_add.php">Add Your Skill.</a>
                            </li>
                        </ul>
                        
                    </li>

                    <li class="<?= basename($_SERVER['PHP_SELF']) == 'brands.php' ? 'active-page' : ' '; ?>">
             <a href="facts.php"><i class="material-icons-two-tone">branding_watermark</i>Brands<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="brands.php">Brands List</a>
                            </li>
                            <li>
                                <a href="brand_add.php">Brands ADD</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link active" href="#">Applications</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="#">Reports</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="../assets/images/flags/us.png" alt=""></a>
                                    <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                        <li><a class="dropdown-item" href="#"><img src="../assets/images/flags/germany.png" alt="">German</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../assets/images/flags/italy.png" alt="">Italian</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../assets/images/flags/china.png" alt="">Chinese</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">4</a>
                                    <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                        <h6 class="dropdown-header">Notifications</h6>
                                        <div class="notifications-dropdown-list">
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">campaign</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Donec tempus nisi sed erat vestibulum, eu suscipit ex laoreet</p>
                                                        <small>19:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-danger text-white">
                                                            <i class="material-icons-outlined">bolt</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Quisque ligula dui, tincidunt nec pharetra eu, fringilla quis mauris</p>
                                                        <small>18:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-success text-white">
                                                            <i class="material-icons-outlined">alternate_email</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Nulla id libero mattis justo euismod congue in et metus</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent sodales lobortis velit ac pellentesque</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent lacinia ante eget tristique mattis. Nam sollicitudin velit sit amet auctor porta</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <div class="sidebar-user-switcher user-activity-online mt-1">
                                        <a href="#">
                                            
                                            <img style="width:40px; height:40px; border-radius:50% " src="../images/profile_image/<?= $_SESSION['admin_image'] ?>">
                                            <span class="activity-indicator"></span>
                                        </a>

                                    </div>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link btn btn-info  btn-sm mt-1 ms-2 fs-6 text-white" href="logout.php">LOGOUT</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">