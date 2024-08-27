

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NCOnline</title>
    <link href="<?= url ?>img/fav.png" type="image/x-icon" rel="icon"/>

    <link rel="stylesheet" href="<?= url ?>1/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?= url ?>1/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="<?= url ?>1/css/vertical-layout-light/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="<?= url ?>1/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= url ?>img/logo2.png" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="<?= url ?>Users/login" method="post">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Sign In</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>

                                </div>
                                <div class="mb-2">

                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="<?= url ?>Users/register" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="<?= url ?>1/vendors/js/vendor.bundle.base.js"></script>

    <script src="<?= url ?>1/js/off-canvas.js"></script>
    <script src="<?= url ?>1/js/hoverable-collapse.js"></script>
    <script src="<?= url ?>1/js/template.js"></script>
    <script src="<?= url ?>1/js/settings.js"></script>
    <script src="<?= url ?>1/js/todolist.js"></script>



    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['login_error'])) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: '{$_SESSION['login_error']}'
        });
    </script>";
        unset($_SESSION['login_error']);
    }

    if (isset($_SESSION['register_success'])) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful',
            text: '{$_SESSION['register_success']}'
        });
    </script>";
        unset($_SESSION['register_success']);
    }
    ?>
</body>

</html>