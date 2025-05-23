<?php /*Template Name: Solutionpage*/ ?>
<?php  get_header(); ?>

<?php
$breadcrumb_home = get_field ("breadcrumb_home");
$breadcrumb_home_link = get_field ("breadcrumb_home_link");
$breadcrumb_inner = get_field ("breadcrumb_inner");
$banner_heading = get_field ("banner_heading");
$banner_heading_blue = get_field ("banner_heading_blue");
$banner_description = get_field ("banner_description");

$plan_suggest = get_field ("plan_suggest", 'options');

$faq_subheading = get_field ("faq_subheading");
$faq_heading = get_field ("faq_heading");
$faq_list = get_field ("faq_list");
$faq_list2 = get_field ("faq_list2");

$domain_subheading = get_field ("domain_subheading",'options');
$domain_heading = get_field ("domain_heading",'options');
$domain_serach_img = get_field ("domain_serach_img",'options');
$domain_suggest_text = get_field ("domain_suggest_text",'options');
$domain_suggest_list = get_field ("domain_suggest_list");
$domain_search_button_text = get_field ("domain_search_button_text",'options');
$domain_search_link = get_field ("domain_search_link",'options');
$domain_transfer_button = get_field ("domain_transfer_button",'options');
$domain_transfer_button_link = get_field ("domain_transfer_button_link",'options');

$business_hassle_subheading = get_field ("business_hassle_subheading");
$business_hassle_heading = get_field ("business_hassle_heading");
$business_card_list = get_field ("business_card_list");
$business_button = get_field ("business_button");
$business_button_link = get_field ("business_button_link");

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





<style>

.card-plan .popular-card .theme-btn.outline-btn.show-plan {

    color: #ffff !important;
 
        }
    .plan-popup.active .theme-btn.outline-btn {
        background: transparent;
        border-color: #2A9BD5;
        color: #2A9BD5;
    }

    .plan-popup.aqua label.aqua {
    border-color: #2A9BD5;
    }

    .aqua a.btn.theme-btn.outline-btn.me-3.me-md-4.close-popup {
    border-color:#2A9BD5; !important;
    color:#2A9BD5; !important;
    /* background: black; */
}

    .plan-popup.blue label.blue ,
    .blue  .price-box li label {
    border-color: #204E82;
    }
    
    .blue a.btn.theme-btn.outline-btn.me-3.me-md-4.close-popup {
    border-color: #204E82 !important;
    color:#204E82 !important;
    /* background: black; */
}


.blue .price-box input:checked ~ label , .blue  span{
    background: #204E82;
    color:#fff;
    /* transition: all ease .4s; */
}

.blue .price-box .pricing-card-title , 
.blue .price-box input:checked ~ label span
{
    color:  #204E82;
    
}

.blue .theme-btn, .newsletter-form input.wpcf7-submit, .support-inquiry form .wpcf7-submit {
    background: #204E82;
}


a.btn.theme-btn.outline-btn.show-plan.blue {
    border-color: #204e82 !important;
    color: #204e82 !important;
}

.blue a.btn.theme-btn.outline-btn.me-3.me-md-4.close-popup:hover ,
a.btn.theme-btn.outline-btn.show-plan.blue:hover
{
    border-color: #204E82 !important;
    color: #fff !important;
    background: #204E82!important;
}

.blue i.fas.fa-check-circle {
    background: #204E82!important;
}

.blue .theme-btn, .newsletter-form input.wpcf7-submit, .support-inquiry form .wpcf7-submit {
    border-color: #204E82 !important;
}

</style> 



    <section class="light-gray-bg py-70 pb-4">
        <div class="container-fluid">
            <div class="row row-gap-4">
                <div class="col-12">
                    <div class="banner-inner text-center">
                        <!-- <nav style="--bs-breadcrumb-divider: '~';" aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?php echo $breadcrumb_home ?></a></li>
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

    <section id="subscribe-plan" class="card-plan py-70">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 row-gap-4 text-center">
            <?php if($plan_suggest){ ?>
            <?php if( have_rows('plan_suggest', 'options') ): ?>
                <?php 
                     $i = 1;
                    while( have_rows('plan_suggest', 'options') ) : the_row(); ?>
                <?php 
                    $plan_icon = get_sub_field('plan_icon');
                    $plan_heading = get_sub_field('plan_heading');
                    $plan_description = get_sub_field('plan_description');
                    $plan_dolor_sign = get_sub_field('plan_dolor_sign');
                    $plan_price = get_sub_field('plan_price');
                    $plan_time = get_sub_field('plan_time');
                    $plan_benifit_list = get_sub_field('plan_benifit_list');
                    $plan_button = get_sub_field('plan_button');
                    $plan_button_link = get_sub_field('plan_button_link');
                    $another_plan_time = get_sub_field('another_plan_time');
                    $another_plan_price = get_sub_field('another_plan_price');
                    $save_price = get_sub_field('save_price');
                    $popup_plan_price_url = get_sub_field('popup_plan_price_url');
                    $another_plan_price_url = get_sub_field('another_plan_price_url');

                ?>
                <div <?php if($i == 2){ ?>  class="col popular-card" <?php } else { ?> class="col" <?php } ?> >
                    <div class="card rounded-3">
                        <div class="card-header">
                        <?php if($plan_icon){ ?>
                            <span class="icon">
                                <img src="<?php echo $plan_icon ?>" alt="" />
                            </span>
                            <?php }  ?>
                            <?php if($plan_heading){ ?>
                            <h3><?php echo $plan_heading ?></h3>
                            <?php }  ?>
                            <?php if($plan_description){ ?>
                            <p><?php echo $plan_description ?></p>
                            <?php }  ?>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title"><sup><?php echo $plan_dolor_sign ?></sup> <?php echo $plan_price ?> <small class="fw-light">/<?php echo $plan_time ?></small></h1>
                            <ul class="list-unstyled">
                            <?php if( have_rows('plan_benifit_list') ): ?>
                                <?php while( have_rows('plan_benifit_list') ) : the_row(); ?>
                                <?php 
                                    $benifit_text = get_sub_field('benifit_text');
                                ?>
                                <?php if($benifit_text){ ?>
                                <li><?php echo $benifit_text ?></li>
                                <?php }  ?>
                                <?php
                                    endwhile;
                                ?>
                                <?php
                                    endif;
                                ?>
                            </ul>



                            <?php 
                            $choose_color = get_sub_field('choose_color'); // Returns an array of selected values.

                            if ($choose_color) {
                                // Convert array values to a space-separated string for CSS classes
                                $classes = implode(' ', $choose_color);
                            } else {
                                $classes = '';
                            }
                            ?>




                            <a href="#subscribe-plan" class="btn theme-btn outline-btn show-plan <?php echo esc_attr($classes); ?>"><?php echo $plan_button ?> <i class="fas fa-arrow-right"></i></a>
                          
                                <div class="plan-popup <?php echo esc_attr($classes); ?>">
                                    <div class="container">
                                        <div class="plan-first">
                                            <div class="heading-plan text-center">
                                                 <?php if($plan_icon){ ?>
                                                <img src="<?php echo $plan_icon ?>" alt="">
                                                 <?php }  ?>
                                                 <?php if($plan_heading){ ?>
                                                    <?php echo $plan_heading ?>
                                                    <?php }  ?>
                                            </div>
                                            <ul class="price-box">
                                               
                                                <li>
                                                    <input type="radio" name="price<?php echo $i; ?>_1" class="select-price" value="<?php echo $another_plan_price ?>" checked>
                                                      <input type="hidden" name="get_url" class="get_url" value="<?php echo $popup_plan_price_url ?> ">

                                                    <label for="selectbox2" class="box-bg <?php echo esc_attr($classes);?> ">
                                                        <i class="fas fa-check-circle"></i>
                                                        <div class="pricing-card-title">
                                                            <sup><?php echo $plan_dolor_sign ?></sup><?php echo $another_plan_price ?> <small class="fw-light">/<?php echo $another_plan_time ?></small>
                                                        </div>
                                                        <?php if($save_price){ ?>
                                                           <span>Save <?php echo $plan_dolor_sign.$save_price; ?></span>
                                                        <?php }  ?>
                                                    </label>
                                                </li>
                                                 <li>
                                                    <input type="radio" name="price<?php echo $i; ?>_1" class="select-price" value="<?php echo $plan_price ?>">
                                                    <input type="hidden" name="get_url" class="get_url" value="<?php echo $another_plan_price_url ?> ">

                                                    <label for="selectbox">
                                                        <i class="fas fa-check-circle"></i>
                                                        <div class="pricing-card-title">
                                                            <sup><?php echo $plan_dolor_sign ?></sup><?php echo $plan_price ?> <small class="fw-light">/<?php echo $plan_time ?></small>
                                                        </div>
                                                        

                                                    </label>
                                                </li>
                                            </ul>


                                            <div class="btns mt-4 mt-lg-5 pt-xl-5 text-center">
                                                <a href="javascript:void(0)" class="btn theme-btn outline-btn me-3 me-md-4 close-popup"><i class="fas fa-arrow-left"></i> Back to Plans</a>
                                                <a href="<?php echo $popup_plan_price_url ?>" class="btn theme-btn get_start_url"><?php echo $plan_button ?>  <i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <?php $i++ ;
                        endwhile;
                    ?>
                    <?php
                        endif;
                    ?>
                <?php }  ?>
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


  

    <section class="choose-sec py-70 pb-0 mt-lg-1" style="padding-top: 70px; padding-bottom: 70px; padding: 70px 0;">
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

    <section class="gradient-color sec-team  pb-5 " style="padding-top: 70px; padding: 70px 0;">
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