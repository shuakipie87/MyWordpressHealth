<?php /*Template Name: Supportpage*/ ?>
<?php  get_header(); ?>

<?php
$breadcrumb_home = get_field ("breadcrumb_home");
$breadcrumb_home_link = get_field ("breadcrumb_home_link");
$breadcrumb_inner = get_field ("breadcrumb_inner");
$banner_heading = get_field ("banner_heading");
$banner_heading_blue = get_field ("banner_heading_blue");
$banner_description = get_field ("banner_description");

// $contact_list = get_field ("contact_list");
$contact_support_subheading = get_field ("contact_support_subheading");
$contact_support_heading = get_field ("contact_support_heading");
$contact_support_description = get_field ("contact_support_description");
$contact_support_img = get_field ("contact_support_img");
$support_option_title = get_field ("support_option_title");
$support_inquiry = get_field ("support_inquiry");
$support_feedback = get_field ("support_feedback");

$support_sub_heading = get_field ("support_sub_heading");
$support_heading = get_field ("support_heading");
$support_description = get_field ("support_description");
$support_button_text = get_field ("support_button_text");
$support_button_link = get_field ("support_button_link");
$support_right_img = get_field ("support_right_img");

$choose_sub_heading = get_field ("choose_sub_heading", 'options');
$choose_heading = get_field ("choose_heading", 'options');
$choose_list = get_field ("choose_list", 'options');

$team_sub_heading = get_field ("team_sub_heading", 'options');
$team_heading = get_field ("team_heading", 'options');
$team_slider = get_field ("team_slider", 'options');
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
                            <h1><?php echo $banner_heading ?> <span class="theme-color"><?php echo $banner_heading_blue ?></span></h1>
                            <p><?php echo $banner_description ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="contact-bx row-gap-4">
                        <?php if( have_rows('contact_list') ): ?>
                        <?php $i=1; while( have_rows('contact_list') ) : the_row(); ?>
                        <?php
                            $contact_list_link = get_sub_field('contact_list_link');
                            $contact_list_icon = get_sub_field('contact_list_icon');
                            $contact_list_heading = get_sub_field('contact_list_heading');
                        ?>
                        <li>
                         <a <?php if($i==2){ ?>  class="drift-open-chat" <?php } else { ?> href="<?php echo $contact_list_link; ?>" <?php } ?>  target="_blank">

                                <div class="bg-bx">
                                    <img src="<?php echo $contact_list_icon; ?>" alt="">
                                    <h3><?php echo $contact_list_heading; ?></h3>
                                </div>
                            </a>
                        </li>
                        <?php $i++;
                            endwhile;
                        ?>
                        <?php
                            endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="support py-4 py-lg-5">
        <div class="container">
            <div class="row row-gap-4 row-gap-5">
                <div class="col-12">
                   <div class="heading text-center">
                       <span><?php echo $contact_support_subheading ?></span>
                       <h2><?php echo $contact_support_heading ?></h2>
                   </div> 
                </div>
            </div>
            <div class="support-form">
                <div class="row row-gap-4 row-gap-5">
                    <div class="col-12 col-md-6">
                        <div class="support-caption">
                            <p><?php echo $contact_support_description ?></p>
                            <img src="<?php echo $contact_support_img ?>" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="support-inquiry">
                            <div class="inquiry-option">
                                <?php echo $support_option_title ?>
                                <ul>
                                    <li class="inquiry active"><?php echo $support_inquiry ?></li>
                                    <li class="feedback"><?php echo $support_feedback ?></li>
                                </ul>
                            </div>
                            <div class="form-inquiry active">
                                <?php echo do_shortcode('[contact-form-7 id="a6b2895" title="Inquiry Form"]'); ?>
                            </div>
                            <div class="form-feedback">
                                <?php echo do_shortcode('[contact-form-7 id="3fc9f28" title="Feedback Form"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blue-bg py-140">
        <div class="container my-lg-2">
            <div class="row row-gap-4 align-items-center">
                <div class="col-12 col-lg-6 text-center text-lg-start">
                    <div class="heading">
                        <span><?php echo $support_sub_heading ?></span>
                        <h2><?php echo $support_heading ?></h2>
                        <p><?php echo $support_description ?></p>
                    </div>
                    <a class="btn theme-btn mt-lg-2 outline-btn white-outline drift-open-chat"><?php echo $support_button_text ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="col-12 col-lg-6 text-center">
                    <img src="<?php echo $support_right_img ?>" />
                </div>
            </div>
        </div>
    </section>

    <section class="choose-sec py-70 pb-0 mt-lg-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="heading-width">
                        <div class="heading text-center">
                            <span><?php echo $choose_sub_heading ?></span>
                            <h2><?php echo $choose_heading ?></h2>
                        </div>
                    </div>
                    <ul class="list-choose">
                        <?php if( have_rows('choose_list', 'options') ): ?>
                            <?php while( have_rows('choose_list', 'options') ) : the_row(); ?>
                            <?php 
                                $choose_icon = get_sub_field('choose_icon');
                                $choose_list_heading = get_sub_field('choose_list_heading');
                                $choose_list_description = get_sub_field('choose_list_description');
                            ?>
                            <li>
                                <span class="icon"><img src="<?php echo $choose_icon ?>" alt="" /></span>
                                <h4><?php echo $choose_list_heading ?></h4>
                                <p><?php echo $choose_list_description ?></p>
                            </li>
                        <?php
                            endwhile;
                        ?>
                        <?php
                            endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="gradient-color sec-team py-140 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="heading text-center">
                        <span><?php echo $team_sub_heading ?></span>
                        <h2><?php echo $team_heading ?></h2>
                    </div>
                    
                    <div class="team-slider dots">
                        <?php if( have_rows('team_slider', 'options') ): ?>
                            <?php while( have_rows('team_slider', 'options') ) : the_row(); ?>
                            <?php 
                                $team_description = get_sub_field('team_description');
                                $team_user = get_sub_field('team_user');
                                $user_designation = get_sub_field('user_designation');
                            ?>
                            <div class="team-items">
                                <p><?php echo $team_description ?></p>
                                <div class="user-name">
                                    <h4><?php echo $team_user ?></h4>
                                    <small><?php echo $user_designation ?></small>
                                </div>
                            </div>
                        <?php
                            endwhile;
                        ?>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>