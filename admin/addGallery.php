<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_FILES['img']))
        {
            $img = $_FILES['img'] ?? "";
            $error = User::setGallery($img);
        }
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

                <div class="body-wrapper">
                    <div class="container-fluid">
                        <div class="card card-body py-3">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-sm-flex align-items-center justify-space-between">
                                        <p class="<?= $error ? 'text-danger' : 'text-success' ?>"><?= $error ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card card-body">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data"> 
                                        <div class="mb-3">
                                            <label class="form-label">Gallery Image Upload</label>
                                            <input type="file" name="img[]" class="form-control" accept="image/*" multiple required>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="d-md-flex align-items-center">
                                                <div class="ms-auto mt-3 mt-md-0">
                                                    <button type="submit" name="submit" class="btn btn-primary hstack gap-6">
                                                        <i class="ti ti-send fs-4"></i>
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "temp/footer.php"; ?>
        
    </body>
</html>