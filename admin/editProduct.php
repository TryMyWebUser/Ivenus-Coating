<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $conn = Database::getConnect();
    $pro = Operations::getProduct($conn);

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['point']) && isset($_POST['title']) && isset($_POST['dec']))
        {
            // die("hi");
            $getID = $_GET['edit_id'] ?? "";
            $point = $_POST['point'] ?? "";
            $title = $_POST['title'] ?? "";
            $dec = $_POST['dec'] ?? "";
            $img = $_FILES['img'] ?? "";

            $error = User::updateProducts($title, $dec, $img, $point, $getID, $conn);
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
                                                <input type="text" class="form-control" placeholder="Enter Title" name="title" value="<?= $pro['title']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="4" name="dec"><?= $pro['dec']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Points (Optional) - Use (,,)</label>
                                                <textarea class="form-control" rows="3" name="point" placeholder="Points"><?= $pro['points'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Image Upload</label><br>
                                                <img src="<?= $pro['img']; ?>" class="mb-2" style="width: 6rem; box-shadow: 0 0 0 2px; border-radius: 5px;" alt="Image Not Found"><br>
                                                <input type="file" name="img" accept="image/*" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <div class="d-md-flex align-items-center">
                                                    <div class="ms-auto mt-3 mt-md-0">
                                                        <button type="submit" name="submit" class="btn btn-primary hstack gap-6">
                                                            <i class="ti ti-send fs-4"></i>
                                                            Save
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