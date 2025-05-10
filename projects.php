<?php
   include("header.php");
?>
<!-- ==== banner start ==== -->
<section class="common-banner" data-background="assets/images/background/breadcrumb-bg1.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="common-banner__inner">
                    <h2 class="title-animation">Projects</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Projects
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==== / banner end ==== -->

<!-- ==== team details section start ==== -->
<?php
    $pro = Operations::getProjectChecker($conn);
    if (!empty($pro)) {
        foreach ($pro as $i => $p) {
?>
<section class="team-details <?= $i == 0 ? '' : 'pt-0' ?>">
    <div class="container">
        <div class="row vertical-column-gap-lg">
            <div class="col-12 col-lg-5">
                <div class="team-details__thumb p-0" data-aos="fade-up" data-aos-duration="1200">
                    <img src="assets/<?= $p['img'] ?>" style="height: 28rem; border-radius: 2rem; object-fit: fill;" alt="Image" />
                </div>
            </div>
            <div class="col-12 col-lg-7 align-content-center">
                <div class="team-details__content">
                    <div class="about-me m-0">
                        <div class="about-me__header">
                            <h3 class="title-animation"><b><?= $p['title'] ?></b></h3>
                        </div>
                        <div class="about-me__content" data-aos="fade-up" data-aos-duration="1200">
                            <p><?= $p['dec'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } } else { echo "<p>Projects Not Found</p>"; } ?>
<!-- ==== / team details section end ==== -->

<?php
   include("footer.php");
?>