<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <?php include "temp/head.php" ?>

    </head>

    <body class="skin-light">
        <div id="wrapper">
            <!-- Sidenav Menu Start -->
            <?php include "temp/sideheader.php" ?>
            <!-- Sidenav Menu End -->

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- Topbar -->
                <?php include "temp/header.php" ?>

                <div class="row border-bottom white-bg dashboard-header">
                    <div class="col-xl-3">
                        <h2>Welcome, Admin.</h2>
                        <span class="text-muted">Here's what's happening with your store today.</span>
                    </div>
                </div>

                <div class="footer">
                    <div class="float-end">
                        Designed and Developed by 
                        <a href="https://trymywebsites.com/" target="_blank">Trymywebsites.</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include "temp/footer.php" ?>

    </body>
</html>