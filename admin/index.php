<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    // Redirect if the user is already logged in
    if (Session::get('login_user'))
    {
        header('Location: welcome.php');
        exit;
    }

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'] ?? "";
            $password = $_POST['password'] ?? "";
            $error = User::login($username, $password);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login - Admin Dashboard</title>
        <meta content="Trymywebsites" name="author" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.png" />

        <!-- Bootstrap css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Icons css -->
        <link href="plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" />

        <!-- Animate.css -->
        <link href="plugins/animate/css/animate.min.css" rel="stylesheet" />

        <!-- Style css -->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" />

        <!-- Head.js -->
        <script src="js/head.js"></script>
    </head>

    <body class="skin-light gray-bg align-content-center">
        <div class="middle-box text-center loginscreen animated fadeInDown p-0">
            <div>
                <div class="mb-2">
                    <a href="index.php">
                        <img alt="image" class="img-fluid logo-black mx-auto" src="../assets/images/logo1.png" />
                        <img alt="image" class="img-fluid logo-white mx-auto" src="../assets/images/logo1.png" />
                    </a>
                </div>
                <h3>Welcome to Admin Login</h3>
                <p class="<?= $error ? 'text-danger' : 'text-succes' ?>">
                    <?= $error ?>
                </p>
                <form class="mt-2" role="form" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary d-block w-100 mb-2">Login</button>
                </form>

            </div>
        </div>

        <!-- Mainly Plugin Scripts -->
        <script src="plugins/jquery/js/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="plugins/pace-js/js/pace.min.js"></script>
        <script src="plugins/wow.js/js/wow.min.js"></script>
        <script src="plugins/lucide/js/lucide.min.js"></script>
        <script src="plugins/simplebar/js/simplebar.min.js"></script>

        <!-- Custom and Plugin Javascript -->
        <script src="js/inspinia.js"></script>
    </body>
</html>