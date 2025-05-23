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
        if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['dec']) && isset($_FILES['img']))
        {
            $title = $_POST['title'] ?? "";
            $dec = $_POST['dec'] ?? "";
            $img = $_FILES['img'] ?? "";

            $error = User::setProjects($title, $dec, $img);
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
                        <div class="card card-body pb-0">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="d-sm-flex align-items-center justify-space-between">
                                        <p class="<?= $error ? 'text-danger' : 'text-success' ?> p-0 m-0"><?= $error ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- start Default Basic Forms -->
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Title" name="title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="4" name="dec" placeholder="Description" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Image Upload</label>
                                                <input type="file" name="img" class="form-control" accept="image/*" required>
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
                                <!-- end Default Basic Forms -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <?php include "temp/footer.php"; ?>
        
    </body>
</html>