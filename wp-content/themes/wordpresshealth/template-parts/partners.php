<?php /*Template Name: Partnerspage*/ ?>
<?php  get_header(); ?>

<?php
$breadcrumb_home = get_field ("breadcrumb_home");
$breadcrumb_home_link = get_field ("breadcrumb_home_link");
$breadcrumb_inner = get_field ("breadcrumb_inner");
$banner_heading = get_field ("banner_heading");
$banner_heading_blue = get_field ("banner_heading_blue");
$banner_description = get_field ("banner_description");

$partners_img = get_field ("partners_img");
$partner_business_hassle_subheading = get_field ("partner_business_hassle_subheading");
$partner_business_hassle_heading = get_field ("partner_business_hassle_heading");
$partner_business_button = get_field ("partner_business_button");
$partner_business_button_link = get_field ("partner_business_button_link");

$faq_subheading = get_field ("faq_subheading");
$faq_heading = get_field ("faq_heading");
$faq_list = get_field ("faq_list");
$faq_list2 = get_field ("faq_list2");

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
                            <h1><?php echo $banner_heading ?> <br> <span class="theme-color"><?php echo $banner_heading_blue ?></span></h1>
                            <p><?php echo $banner_description ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-80 pt-4 pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="prtner-img text-center pb-100">
                        <img src="<?php echo $partners_img ?>" alt="">
                    </div>
                    <div class="heading text-center mb-4 mb-lg-5 pb-lg-1">
                        <span><?php echo $partner_business_hassle_subheading ?></span>
                        <h2><?php echo $partner_business_hassle_heading ?></h2>
                    </div>
                    <div class="row row-gap-4 row-md-gap-5">
                        <?php if( have_rows('partner_business_card_list') ): ?>
                            <?php while( have_rows('partner_business_card_list') ) : the_row(); ?>
                            <?php 
                                $partner_card_icon = get_sub_field('partner_card_icon');
                                $partner_card_title = get_sub_field('partner_card_title');
                                $partner_card_description = get_sub_field('partner_card_description');
                            ?>                            
                        <div class="col-12 col-md-6">
                            <div class="bussine-card animation-card">
                                <span class="card-icon"><img src="<?php echo $partner_card_icon ?>" alt="" /></span>
                                <div class="card-caption">
                                    <h5><?php echo $partner_card_title ?></h5>
                                    <p><?php echo $partner_card_description ?></p>
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
                    <div class="text-center pt-lg-4">
                        <a href="<?php echo $partner_business_button_link ?>" class="btn theme-btn" target="_blank"><?php echo $partner_business_button ?> <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php if ( have_rows('faq') ) : ?>
    <?php while ( have_rows('faq') ) : the_row(); ?>

        <?php if ( get_row_layout() == 'faq_section' ): ?>    
            <?php get_template_part('blocks/faq'); ?>
        <?php endif; ?>   

    <?php endwhile; ?>
<?php endif; ?>

    <section class="sky-bg py-70">
        <div class="container my-lg-2">
            <div class="row row-gap-4 align-items-center">
                <div class="col-12 col-lg-6 text-center text-lg-start">
                    <div class="heading">
                        <span><?php echo $support_sub_heading ?></span>
                        <h2><?php echo $support_heading ?></h2>
                        <p><?php echo $support_description ?></p>
                    </div>
                    <a href="<?php echo $support_button_link ?>" class="btn theme-btn mt-lg-2 outline-btn white-outline" target="_blank"><?php echo $support_button_text ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="col-12 col-lg-6 text-center">
                    <img src="<?php echo $support_right_img ?>" />
                </div>
            </div>
        </div>
    </section>

    <section class="choose-sec py-70 pb-70 mt-lg-1">
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




                    
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#search-solution').on('keyup', function() {
            // Removed the delete icon functionality
        });

        jQuery(".search-icon").click(function(e) {
            e.preventDefault();

            jQuery('.loading-img').show();
            var faq_qus = jQuery('#search-solution').val();

            jQuery.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: 'POST',
                data: {
                    action: 'faq_question_get',
                    faq_qus: faq_qus,
                },
                success: function(response) {
                    if (response) {
                        $('#search-faq-result').show();
                        $('#search-faq-result').html(response); // Insert results
                        $('.faq-main-sec').hide();
                        console.log(response);
                        jQuery('.loading-img').hide();
                    } else {
                        $('.faq-main-sec').show();
                        $('#search-faq-result').hide();
                        jQuery('.loading-img').hide();
                    }
                }
            });
        });
    });
</script>

<style type="text/css">
     .search-icon {
         position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            font-size: 18px;
    

        }
</style>
    <?php get_footer(); ?>