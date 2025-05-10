<?php
    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user')) {
        header("Location: index.php");
        exit;
    }

    $conn = Database::getConnect();
    $gallery = Operations::getGallery($conn);
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
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            <?php
                                if (!empty($gallery)) {
                                    foreach ($gallery as $img) {
                                        
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <!-- Card -->
                                <div class="card border mb-3">
                                    <img class="card-img-top img-responsive" src="<?= $img['img']; ?>" alt="Card image" />
                                    <div class="card-body">
                                        <a href="deleteGallery.php?delete_id=<?= $img['id']; ?>">
                                            <button type="button" class="btn btn-square btn-outline-danger ms-1 p-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><path fill="currentColor" d="M13.5 6.5V7h5v-.5a2.5 2.5 0 0 0-5 0m-2 .5v-.5a4.5 4.5 0 1 1 9 0V7H28a1 1 0 1 1 0 2h-1.508L24.6 25.568A5 5 0 0 1 19.63 30h-7.26a5 5 0 0 1-4.97-4.432L5.508 9H4a1 1 0 0 1 0-2zM9.388 25.34a3 3 0 0 0 2.98 2.66h7.263a3 3 0 0 0 2.98-2.66L24.48 9H7.521zM13 12.5a1 1 0 0 1 1 1v10a1 1 0 1 1-2 0v-10a1 1 0 0 1 1-1m7 1a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0z"/></svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <?php
                                    }
                                } else {
                                    echo "<p>Gallery Image Not Found</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "temp/footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    </body>
</html>