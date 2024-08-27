<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['user'] ?? null;
$role = $user->role ?? null;
?>
<?php if ($role === 'administrator') : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <link rel="stylesheet" href="<?= url ?>1/vendors/typicons/typicons.css">
        <link rel="stylesheet" href="<?= url ?>1/vendors/css/vendor.bundle.base.css">


        <link rel="stylesheet" href="<?= url ?>1/css/vertical-layout-light/style.css">

        <title>NCOnline</title>
        <link href="<?= url ?>img/fav.png" type="image/x-icon" rel="icon" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </head>

    <body>
        <div class="container-scroller">
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex justify-content-center">
                    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                        <a class="navbar-brand brand-logo" href="#"><img src="<?= url ?>img/logo.png" alt="logo" /></a>

                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="typcn typcn-th-menu"></span>
                        </button>
                    </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav mr-lg-2">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">

                                <span class="nav-profile-name">Welcome Administrator!</span>
                            </a>

                        </li>

                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" href="#" onclick="logout()">
                                <i class="typcn typcn-eject"></i>
                            </a>

                        </li>



                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">
                <div class="theme-setting-wrapper">
                    <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
                    <div id="theme-settings" class="settings-panel">
                        <i class="settings-close typcn typcn-times"></i>
                        <p class="settings-heading">SIDEBAR SKINS</p>
                        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                        </div>
                        <div class="sidebar-bg-options" id="sidebar-dark-theme">
                            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                        </div>
                        <p class="settings-heading mt-2">HEADER SKINS</p>
                        <div class="color-tiles mx-0 px-4">
                            <div class="tiles success"></div>
                            <div class="tiles warning"></div>
                            <div class="tiles danger"></div>
                            <div class="tiles info"></div>
                            <div class="tiles dark"></div>
                            <div class="tiles default"></div>
                        </div>
                    </div>
                </div>

                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">

                        <li class="nav-item">
                            <a class="nav-link" href="<?= url ?>Categories">
                                <i class="typcn typcn-tags menu-icon"></i>
                                <span class="menu-title">Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url ?>Products">
                                <i class="typcn typcn-shopping-bag menu-icon"></i>
                                <span class="menu-title">Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url ?>Orders">
                                <i class="typcn typcn-clipboard menu-icon"></i>
                                <span class="menu-title">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url ?>Users">
                                <i class="typcn typcn-group menu-icon"></i>
                                <span class="menu-title">Users</span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="main-panel">







                <?php endif; ?>
                <?php if ($role === 'user') : ?>


                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <title>NCOnline</title>
                        <link href="<?= url ?>img/fav.png" type="image/x-icon" rel="icon" />


                        <link rel="stylesheet" href="<?= url ?>1/vendors/typicons/typicons.css">
                        <link rel="stylesheet" href="<?= url ?>1/vendors/css/vendor.bundle.base.css">

                        <link rel="stylesheet" href="<?= url ?>1/vendors/owl-carousel-2/owl.carousel.min.css">
                        <link rel="stylesheet" href="<?= url ?>1/vendors/owl-carousel-2/owl.theme.default.min.css">

                        <link rel="stylesheet" href="<?= url ?>1/css/vertical-layout-light/style.css">

                        <link rel="shortcut icon" href="<?= url ?>1/images/favicon.ico" />
                    </head>


                    <body>
                        <div class="container-scroller">
                            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                                <div class="navbar-brand-wrapper d-flex justify-content-center">
                                    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                                        <a class="navbar-brand brand-logo" href="#"><img src="<?= url ?>img/logo.png" alt="logo" /></a>
                                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                                            <span class="typcn typcn-th-menu"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                                    <ul class="navbar-nav mr-lg-2">
                                        <li class="nav-item nav-profile dropdown">
                                            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                                                <span class="nav-profile-name">Welcome to NCOnline!</span>
                                            </a>
                                        </li>
                                    </ul>


                                    <ul class="navbar-nav navbar-nav-right">
                                        <li class="nav-item">
                                            <a class="nav-link count-indicator  d-flex justify-content-center align-items-center" href="<?= url ?>Carts">
                                                <i class="typcn typcn-shopping-cart menu-icon"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link count-indicator  d-flex justify-content-center align-items-center" href="<?= url ?>Orders/myOrder">
                                                <i class="typcn typcn-clipboard menu-icon"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link count-indicator  d-flex justify-content-center align-items-center" href="#" onclick="logout()">
                                                <i class="typcn typcn-eject"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                                        <span class="typcn typcn-th-menu"></span>
                                    </button>
                                </div>
                            </nav>

                            <div class="container-fluid page-body-wrapper">
                                <div class="theme-setting-wrapper">
                                    <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
                                    <div id="theme-settings" class="settings-panel">
                                        <i class="settings-close typcn typcn-times"></i>
                                        <p class="settings-heading">SIDEBAR SKINS</p>
                                        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                                            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                                        </div>
                                        <div class="sidebar-bg-options" id="sidebar-dark-theme">
                                            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                                        </div>
                                        <p class="settings-heading mt-2">HEADER SKINS</p>
                                        <div class="color-tiles mx-0 px-4">
                                            <div class="tiles success"></div>
                                            <div class="tiles warning"></div>
                                            <div class="tiles danger"></div>
                                            <div class="tiles info"></div>
                                            <div class="tiles dark"></div>
                                            <div class="tiles default"></div>
                                        </div>
                                    </div>
                                </div>

                                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= url ?>Home">
                                                <i class="typcn typcn-device-desktop menu-icon"></i>
                                                <span class="menu-title">Home</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= url ?>Home/about">
                                                <i class="typcn typcn-info-large menu-icon"></i>
                                                <span class="menu-title">About</span>
                                            </a>
                                        </li>


                                    </ul>
                                </nav>

                                <div class="main-panel">



                                <?php endif; ?>