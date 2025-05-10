<?php
include("header.php");
?>
<!-- ==== banner start ==== -->
<section class="common-banner" data-background="assets/images/background/breadcrumb-bg1.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="common-banner__inner">
                    <h2 class="title-animation">Products</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Products
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==== / banner end ==== -->
<!-- ==== blog details section start ==== -->
<?php
    $pro = Operations::getProductChecker($conn);
    if (!empty($pro)) {
        foreach ($pro as $i => $p) {
?>
<section class="blog-details" id="<?= $p['id'] ?>">
    <div class="container">
        <div class="row vertical-column-gap-lg">
            <div class="col-12">
                <div class="blog-details__wrapper">
                    <div class="details-content">
                        <!-- Service 1 -->
                        <div class="details-group">
                            <div class="row vertical-column-gap">
                                <div class="col-12 col-xl-6">
                                    <div class="wrapper">
                                        <div class="details-header">
                                            <h4 class="title-animation"><?= $i + 1 . '. ' . $p['title'] ?></h4>
                                        </div>
                                        <div class="details-article">
                                            <p><?= $p['dec'] ?></p>
                                            <ul>
                                                <?php
                                                    if (!empty($p['points'])) {
                                                        $points = explode(',,', $p['points']);
                                                        foreach ($points as $point) {
                                                ?>
                                                <li><i class="fa-solid fa-check"></i> <?= $point ?></li>
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="small-poster" data-aos="zoom-in" data-aos-duration="1200">
                                        <img src="assets/<?= $p['img'] ?>" class="rounded-4" style="width: -webkit-fill-available;" alt="Image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } } else { echo "<p>Product Not Found</p>"; } ?>
<!-- ==== / blog details section end ==== -->

<?php
include("footer.php");
?>