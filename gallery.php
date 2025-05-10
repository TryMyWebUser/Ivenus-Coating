<?php
include "libs/load.php";
include("header.php");
?>
<!-- ==== banner start ==== -->
<section class="common-banner" data-background="assets/images/background/breadcrumb-bg1.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="common-banner__inner">
                    <h2 class="title-animation">Gallery</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Gallery
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==== / banner end ==== -->
<!-- ==== blog section start ==== -->
<section class="blog blog-main">
    <div class="container">
        <div class="row vertical-column-gap">
            <?php
                $gallery = Operations::getGallery($conn);
                if (!empty($gallery)) {
                    foreach ($gallery as $img) {
            ?>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="blog__single" data-aos="fade-up" data-aos-duration="1200">
                    <div class="thumb">
                        <img src="assets/<?= $img['img']; ?>" alt="Gallery Image" />
                    </div>
                </div>
            </div>
            <?php } } else { echo "<p>Gallery Image Not Found!</p>"; } ?>
        </div>
    </div>
</section>
<!-- ==== / blog section end ==== -->

<?php
include("footer.php");
?>