<?php /*Template Name: Whyuspage*/ ?>
<?php  get_header(); ?>

<?php
$breadcrumb_home = get_field ("breadcrumb_home");
$breadcrumb_home_link = get_field ("breadcrumb_home_link");
$breadcrumb_inner = get_field ("breadcrumb_inner");
$banner_heading = get_field ("banner_heading");
$banner_heading_blue = get_field ("banner_heading_blue");
$banner_description = get_field ("banner_description");

$team_group_subheading = get_field ("team_group_subheading");
$team_group_heading = get_field ("team_group_heading");
$team_group_list = get_field ("team_group_list");
$team_group_video = get_field ("team_group_video");

$performance_subheading = get_field ("performance_subheading");
$performance_heading = get_field ("performance_heading");
$performance_img = get_field ("performance_img");
$performance_card_heading = get_field ("performance_card_heading");
$performance_card_description = get_field ("performance_card_description");

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

    <!-- <section class="team-page py-4 py-lg-5">
        <div class="container">
            <div class="row row-gap-4 row-gap-5">
                <div class="col-12">
                   <div class="heading text-center">
                       <span><?php echo $team_group_subheading ?></span>
                       <h2><?php echo $team_group_heading ?></h2>
                   </div> 
                   <div class="team-group">
                       <div class="row row-gap-4 row-gap-lg-5">
                        <?php if( have_rows('team_group_list') ): ?>
                            <?php while( have_rows('team_group_list') ) : the_row(); ?>
                            <?php
                                $employee_img = get_sub_field('employee_img');
                                $employee_name = get_sub_field('employee_name');
                                $employee_designation = get_sub_field('employee_designation');
                            ?>
                           <div class="col-12 col-sm-6 col-md-4">
                               <div class="team-profile animation-card">
                                   <div class="user-img">
                                       <img src="<?php echo $employee_img ?>" alt="team">
                                   </div>
                                   <div class="user-detail">
                                       <h5><?php echo $employee_name ?></h5>
                                       <small><?php echo $employee_designation ?></small>
                                   </div>
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
                <div class="col-12">
                    <div class="video-thumb">
                        <?php echo $team_group_video ?>
                   </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="team-page py-4">
    <div class="container">
        <div class="row row-gap-4 row-gap-5">
            <div class="col-12">
                
                <div class="team-group" style="margin-top:unset;">
                    <div class="row row-gap-4 row-gap-lg-5">
                        <?php if( have_rows('team_group_list') ): ?>
                            <?php $count = 0; $inserted = false; ?>
                            <?php while( have_rows('team_group_list') ) : the_row(); ?>
                                <?php
                                    $employee_img = get_sub_field('employee_img');
                                    $employee_name = get_sub_field('employee_name');
                                    $employee_designation = get_sub_field('employee_designation');
                                    $count++;
                                ?>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="team-profile animation-card">
                                        <div class="user-img">
                                            <img src="<?php echo $employee_img; ?>" alt="team">
                                        </div>
                                        <div class="user-detail">
                                            <h5><?php echo $employee_name; ?></h5>
                                            <small><?php echo $employee_designation; ?></small>
                                        </div>
                                    </div>
                                </div>

                                <?php if( $count == 3 && !$inserted ): // Insert content only once after the first 3 profiles ?>
                                    <div class="heading text-center">
                    <span><?php echo $team_group_subheading; ?></span>
                    <h2><?php echo $team_group_heading; ?></h2>
                </div>
                                    <?php $inserted = true; // Prevent further insertions ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="video-thumb">
                    <?php echo $team_group_video; ?>
                </div>
            </div>
        </div>
    </div>
</section>



    <section class="gradient-color py-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-width">
                        <div class="heading text-center mb-4 mb-lg-5 pb-lg-1">
                            <span><?php echo $performance_subheading ?></span>
                            <h2><?php echo $performance_heading ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="our-mission card">
                                <div class="text-center"><img src="<?php echo $performance_img ?>" alt="" /></div>
                                <div class="mission-caption">
                                    <h4><?php echo $performance_card_heading ?></h4>
                                    <p><?php echo $performance_card_description ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blue-bg py-70">
        <div class="container my-lg-2">
            <div class="row row-gap-4 align-items-center">
                <div class="col-12 col-lg-6 text-center text-lg-start">
                    <div class="heading">
                        <span><?php echo $support_sub_heading ?></span>
                        <h2><?php echo $support_heading ?></h2>
                        <p><?php echo $support_description ?></p>
                    </div>
                    <a class="btn theme-btn mt-lg-2 drift-open-chat"><?php echo $support_button_text ?> <i class="fas fa-arrow-right"></i></a>
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

    <section class="gradient-color sec-team py-70 pb-5">
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