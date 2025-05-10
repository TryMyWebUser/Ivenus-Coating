<?php include "libs/load.php"; $conn = Database::getConnect(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- required meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- #favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
        <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
        <!-- #title -->
        <title>Ivenus Coating and Engineering</title>
        <!-- #keywords -->
        <meta name="keywords" content="real estate, house listing, directory listing, html, bootstrap, scss" />
        <!-- #description -->
        <meta name="description" content="" />
        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&amp;family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet" />
        <!-- color themes -->
        <link rel="stylesheet" href="assets/css/blue-theme.css" id="switch-color" />
        <!-- <link rel="stylesheet" href="assets/font/flaticon_flaticons.css"> -->
        <!-- main css -->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <style>
        /* for desktop */
        .whatsapp_float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            left: 40px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
            display: block;
        }

        .whatsapp-icon {
            margin-top: 16px;
        }
        /* for mobile */
        @media screen and (max-width: 767px) {
            .whatsapp-icon {
                margin-top: 10px;
            }
            .whatsapp_float {
                width: 40px;
                height: 40px;
                bottom: 20px;
                left: 10px;
                font-size: 22px;
            }
        }
    </style>

    <body>
        <!--[if lt IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <div class="page-wrapper">
            <!-- preloader start -->
            <!--<div class="preloader"></div>-->
            <!-- / preloader start -->

            <!-- ==== header start ==== -->
            <header class="main-header">
                <div class="main-header__topbar d-none d-lg-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-header__topbar__content">
                                    <!-- <div class="main-header__topbar__content-wrapper">
                              <ul class="main-header__topbar__list">
                                 <li><a href="sign-in.html"><i class="icon-user-key"></i>Login or Register</a>
                                 </li>
                                 <li><a href="properties-grid-view.html"><i class="icon-home"></i>Submit
                                    Property</a>
                                 </li>
                              </ul>
                              <select name="country" class="main-header__topbar__select-country">
                                 <option data-flag="fi-gb-eng">English</option>
                                 <option data-flag="fi-us">Spanish</option>
                                 <option data-flag="fi-cn">Chinese</option>
                                 <option data-flag="fi-it">Italian</option>
                              </select>
                           </div> -->
                                    <!-- Make sure to include Font Awesome CDN -->

                                    <div class="social">
                                        <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook" title="Facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="https://wa.me/+916382590515" target="_blank" aria-label="WhatsApp" title="WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        <a href="https://www.youtube.com/" target="_blank" aria-label="YouTube" title="YouTube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-header__menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="main-header__menu-box">
                                    <nav class="navbar p-0">
                                        <div class="navbar-logo d-block d-lg-none">
                                            <a href="index.php">
                                                <img src="assets/images/logo1.png" alt="Image" />
                                            </a>
                                        </div>
                                        <div class="navbar__menu d-none d-xl-block">
                                            <ul class="navbar__list">
                                                <li class="navbar__item nav-fade">
                                                    <a href="index.php">Home</a>
                                                </li>
                                                <li class="navbar__item nav-fade">
                                                    <a href="about.php">About Us</a>
                                                </li>
                                                <li class="navbar__item navbar__item--has-children nav-fade">
                                                    <a href="#" aria-label="dropdown menu"
                                                        class="navbar__dropdown-label dropdown-label-alter">Our Products</a>
                                                    <?php
                                                        $pro = Operations::getProductChecker($conn);
                                                        if (!empty($pro)) {
                                                    ?>
                                                    <ul class="navbar__sub-menu">
                                                        <?php
                                                            foreach ($pro as $p) {
                                                        ?>
                                                        <li>
                                                            <a href="details.php#<?= $p['id'] ?>"><?= $p['title'] ?></a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
                                                <li class="navbar__item nav-fade">
                                                    <a href="projects.php">Projects</a>
                                                </li>
                                                <li class="navbar__item nav-fade">
                                                    <a href="services.php">Services</a>
                                                </li>
                                                <li class="navbar__item nav-fade">
                                                    <a href="gallery.php">Gallery</a>
                                                </li>
                                                <li class="navbar__item nav-fade">
                                                    <a href="contact.php">Contact Us</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="navbar__options">
                                            <!-- <div class="navbar__mobile-options d-none d-xl-block">
                                                <div class="contact-btn">
                                                    <div class="contact-icon">
                                                        <i class="flaticon-phone-call"></i>
                                                    </div>
                                                    <div class="contact-content">
                                                        <p>Call Us Now</p>
                                                        <a href="tel:+917010905569">+91 7010905569</a>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <button class="open-offcanvas-nav d-flex d-xl-none" aria-label="toggle mobile menu" title="open offcanvas menu">
                                                <span class="icon-bar top-bar"></span>
                                                <span class="icon-bar middle-bar"></span>
                                                <span class="icon-bar bottom-bar"></span>
                                            </button>
                                        </div>
                                    </nav>
                                    <div class="logo d-none d-lg-flex">
                                        <a href="index.php" style="background: #fff; padding: 5px; border-radius: 15px;">
                                            <img src="assets/images/logo1.png" alt="Image" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ==== mobile menu start ==== -->
                <div class="mobile-menu d-block d-xl-none">
                    <nav class="mobile-menu__wrapper">
                        <div class="mobile-menu__header nav-fade">
                            <div class="logo">
                                <a href="index.php" aria-label="home page" title="logo">
                                    <img src="assets/images/logo1.png" alt="Image" />
                                </a>
                            </div>
                            <button aria-label="close mobile menu" class="close-mobile-menu">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="mobile-menu__list"></div>
                        <div class="mobile-menu__social social nav-fade">
                            <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/+916382590515" target="_blank" aria-label="WhatsApp" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" aria-label="YouTube" title="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="mobile-menu__backdrop"></div>
                <!-- ==== / mobile menu end ==== -->
            </header>
            <!-- ==== / header end ==== -->