
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NCOnline</title>
    <link href="<?= url ?>img/fav.png" type="image/x-icon" rel="icon" />

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
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form action="<?= url ?>Users/register" method="post">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <input type="hidden" name="role" value="user">
                                <div class="mt-3">

                                    <button name="register" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                                </div>

                            </form>
                            <div class="mb-2">

                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="<?= url ?>Users/login" class="text-primary">Login</a>
                            </div>

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
    <script src="<?= url ?>plugins/jquery/jquery.min.js"></script>

    <script src="<?= url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= url ?>dist/js/adminlte.min.js?v=3.2.0"></script>


    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['register_error'])) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Registration Failed',
            text: '{$_SESSION['register_error']}'
        });
    </script>";
        unset($_SESSION['register_error']);
    }
    ?>
</body>

</html>