<?php /*Template Name: Tospage*/ ?>
<?php  get_header(); ?>

<?php
$breadcrumb_home = get_field ("breadcrumb_home");
$breadcrumb_home_link = get_field ("breadcrumb_home_link");
$breadcrumb_inner = get_field ("breadcrumb_inner");
$banner_heading = get_field ("banner_heading");
$banner_heading_blue = get_field ("banner_heading_blue");
$banner_description = get_field ("banner_description");

$tos_subheading = get_field ("tos_subheading");
$tos_heading = get_field ("tos_heading");
$tos_icon = get_field ("tos_icon");
$tos_description = get_field ("tos_description");
?>

    <section class="light-gray-bg py-70 pb-4">
        <div class="container-fluid">
            <div class="row row-gap-4">
                <div class="col-12">
                    <div class="banner-inner text-center">
                        <!-- <nav style="--bs-breadcrumb-divider: '~';" aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $breadcrumb_home_link ?>"><?php echo $breadcrumb_home ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrumb_inner ?></li>
                          </ol>
                        </nav> -->
                        <div class="heading">
                            <h1><?php echo $banner_heading ?> <br> <span class="theme-color"><?php echo $banner_heading_blue ?></span></h1>
                            <p><?php echo $banner_description ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-width">
                        <div class="heading text-center mb-4 mb-lg-5 pb-lg-1">
                            <span><?php echo $tos_subheading ?></span>
                            <h2><?php echo $tos_heading ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="our-mission card" style="padding-top: 0;">
                                <div class="text-center"><img src="<?php echo $tos_icon ?>" alt="" /></div>
                                <div class="mission-caption">
                                    <?php echo $tos_description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>