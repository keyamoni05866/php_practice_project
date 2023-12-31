<?php

require('./config/db.php');
session_start();
$users_select_query = "SELECT * FROM users";
$users_connect = mysqli_query($db_connect, $users_select_query);
$users = mysqli_fetch_assoc($users_connect);


$select_service = "SELECT * FROM services WHERE status='active' ";
$services = mysqli_query($db_connect, $select_service);

$select_portfolio = "SELECT * FROM portfolios WHERE status='active' ";
$portfolios = mysqli_query($db_connect, $select_portfolio);

// print_r($portfolio['image'])


$select_testimonial = "SELECT * FROM testimonial WHERE status='active' ";
$testimonials = mysqli_query($db_connect, $select_testimonial);


$select_facts = "SELECT * FROM facts WHERE status='active' ";
$facts = mysqli_query($db_connect, $select_facts);


$select_brand = "SELECT * FROM brands  ";
$brands = mysqli_query($db_connect, $select_brand);




$select_about = "SELECT * FROM about WHERE status='active' ";
$abouts = mysqli_query($db_connect, $select_about);

$select_skill = "SELECT * FROM skills WHERE status='active' ";
$skills = mysqli_query($db_connect, $select_skill);
?>







<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kufa - Personal Portfolio HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="./frontend_assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->

    <link rel="stylesheet" href="./frontend_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend_assets/css/animate.min.css">
    <link rel="stylesheet" href="./frontend_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./frontend_assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./frontend_assets/css/flaticon.css">
    <link rel="stylesheet" href="./frontend_assets/css/slick.css">
    <link rel="stylesheet" href="./frontend_assets/css/aos.css">
    <link rel="stylesheet" href="./frontend_assets/css/default.css">
    <link rel="stylesheet" href="./frontend_assets/css/style.css">
    <link rel="stylesheet" href="./frontend_assets/css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.html" class="navbar-brand logo-sticky-none"><img src="./frontend_assets/img/logo/logo.png" alt="Logo"></a>
                                <a href="index.html" class="navbar-brand s-logo-none"><img src="./frontend_assets/img/logo/s_logo.png" alt="Logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index-2.html">
                    <img src="./frontend_assets/img/logo/logo.png" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <?php foreach($abouts as $about):?>
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p><?= $about['address']?></p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p><?= $about['phone']?></p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p><?= $about['gmail']?></p>
                </div>
            </div>
            <div class="social-icon-right mt-20">
                <a href="<?= $about['facebook']?>"><i class="fab fa-facebook-f"></i></a>
                <a href="<?= $about['linkedin']?>"><i class="fab fa-linkedin"></i></a>
            
            </div>
            <?php endforeach;?>
        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>

    <!-- header-end -->

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix ">
            <div class="container">




                <div class=" row align-items-center">

                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">

                            <?php if (isset($_SESSION['contact_success'])) : ?>

                                <h6 class="wow fadeInUp " style="padding-bottom:200px" data-wow-delay="0.2s"><?= $_SESSION['contact_success']; ?></h6>
                            <?php endif;
                            unset($_SESSION['contact_success']) ?>
                            <?php if (isset($_SESSION['contact_error'])) : ?>

                                <h6 class="wow fadeInUp text-danger " style="padding-bottom:200px" data-wow-delay="0.2s"><?= $_SESSION['contact_error']; ?></h6>
                            <?php endif;
                            unset($_SESSION['contact_success']) ?>
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                            <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $users['name'] ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.6s"><?= $users['description'] ?></p>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                            <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block" style="margin-bottom:150px;">
                        <div class=" text-right">
                            <img src="./images/profile_image/<?= $users['image']; ?>" alt="" style="width:500px; height: 600px;  border-radius:20%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="./frontend_assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <?php foreach($abouts as $about):?>
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="./images/about_image/<?= $about['image']; ?>" title="me-01" alt="me-01"  class="rounded ">
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            
                        <?php foreach($abouts as $about):?>
                            <p><?= $about['description']?></p>

                                <?php endforeach;?>    
                            <h3>Skills:</h3>
                        </div>
                        <!-- Education Item -->

                    <?php foreach($skills as $skill):?>
                        <div class="education">
                            <div class="year"><?= $skill['year']?></div>
                            <div class="line"></div>
                            <div class="location">
                                <span><?= $skill['skill']?></span>
                                <div class="progressWrapper">
                                    <div class="progress">
                                        <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>


                        <!-- End Education Item -->
                        <!-- Education Item -->
                    
                        <!-- End Education Item -->
                        <!-- Education Item -->
                        
                        <!-- End Education Item -->
                        <!-- Education Item -->
                       
                        <!-- End Education Item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($services as $service) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?= $service['icon'] ?>"></i>
                                <h3><?= $service['title'] ?></h3>
                                <p>
                                    <?= $service['description'] ?>
                                </p>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php foreach ($portfolios as $portfolio) : ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
                                <div class="speaker-thumb">
                                    <img src="./images/portfolio_image/<?= $portfolio['image']; ?>" alt="img" style="width:400px; height:500px">

                                </div>
                                <div class="speaker-overlay">
                                    <span>Design</span>
                                    <h4><a href="portfolio-single.html"><?= $portfolio['title'] ?></a></h4>
                                    <a href="single.php?single_page=<?= $portfolio['id'] ?>" class="arrow-btn">More Information<span></span></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                    <?php foreach($facts as $fact):?>
                        <div class="col-xl-2 col-lg-3 col-sm-6 ">
                           
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="<?=$fact['icon']?>"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class=""><?=$fact['number']?></span></h2>
                                    <span><?=$fact['name']?></span>
                                </div>
                            </div>
                      
                        </div>
                        <?php endforeach;?>
                       
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                   
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                        <?php foreach($testimonials as $testimonial):?>
                            <div class="single-testimonial text-center">
                                <div class="testi-avatar">
                                    <img src="./images/testimonial_image/<?= $testimonial['image']; ?>" alt="img" style="widht:100px; height:100px; border-radius:50%">
                                </div>
                                <div class="testi-content">
                                    <h4><span>“</span><?= $testimonial['message']; ?> <span>”</span></h4>
                                    <div class="testi-avatar-info">
                                        <h5><?= $testimonial['name']; ?></h5>
                                        <span><?= $testimonial['profession']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>

                    
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                    <?php foreach($brands as $brand):?>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="./images/brand_image/<?= $brand['image']; ?>" alt="img">
                            <h6 class="mt-5"><?= $brand['name']; ?></h6>
                        </div>
                    </div>
                  <?php endforeach;?>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                            <h5>OFFICE IN <span>NEW YORK</span></h5>
                            <div class="contact-list">
                                <ul>
                                     <?php foreach($abouts as $about)?>
                                    <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $about['address']?></li>
                                    <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $about['phone']?></li>
                                    <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $about['gmail']?></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">


                        <form action="mail_post.php" class="mt-6" method="POST">
                            <input type="text" placeholder="your name *" style="width: 100%;border: none; background: #19273e; padding: 20px 30px; margin-bottom: 30px; color: #8b98af; font-size: 14px;" name="name">

                            <input type="email" placeholder="your email *" style="width: 100%;border: none; background: #19273e; padding: 20px 30px; margin-bottom: 30px; color: #8b98af; font-size: 14px;" name="email">

                            <input type="text" placeholder="your subject *" style="width: 100%;border: none; background: #19273e; padding: 20px 30px; margin-bottom: 30px; color: #8b98af; font-size: 14px;" name="subject">

                            <textarea name="message" id="message" placeholder="your message *" style="width: 100%;border: none; background: #19273e; padding: 20px 30px; margin-bottom: 30px; color: #8b98af; font-size: 14px; height: 130px; margin-bottom: 40px;" name="message"></textarea>
                            <button type="submit" name="mail_send_btn" class="btn">SEND</button>
                        </form>


                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->





    <!-- JS here -->
    <script src="./frontend_assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./frontend_assets/js/popper.min.js"></script>
    <script src="./frontend_assets/js/bootstrap.min.js"></script>
    <script src="./frontend_assets/js/isotope.pkgd.min.js"></script>
    <script src="./frontend_assets/js/one-page-nav-min.js"></script>
    <script src="./frontend_assets/js/slick.min.js"></script>
    <script src="./frontend_assets/js/ajax-form.js"></script>
    <script src="./frontend_assets/js/wow.min.js"></script>
    <script src="./frontend_assets/js/aos.js"></script>
    <script src="./frontend_assets/js/jquery.waypoints.min.js"></script>
    <script src="./frontend_assets/js/jquery.counterup.min.js"></script>
    <script src="./frontend_assets/js/jquery.scrollUp.min.js"></script>
    <script src="./frontend_assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="./frontend_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./frontend_assets/js/plugins.js"></script>
    <script src="./frontend_assets/js/main.js"></script>
</body>

</html>


<!-- sltd pcex tqrx clqo -->