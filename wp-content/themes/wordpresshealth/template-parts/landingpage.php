<?php /*Template Name: LandingPage*/ ?>
<?php  get_header(); ?>

<?php
$hero_banner_subheading = get_field ("hero_banner_subheading");
$hero_banner_headind = get_field ("hero_banner_headind");
$hero_banner_heading_span = get_field ("hero_banner_heading_span");
$hero_banner_description = get_field ("hero_banner_description");
$icon_hero_list = get_field ("icon_hero_list");
$banner_getstart_button = get_field ("banner_getstart_button");
$banner_getstart_button_link = get_field ("banner_getstart_button_link");
$banner_request_button = get_field ("banner_request_button");
$banner_request_button_link = get_field ("banner_request_button_link");
$banner_right_img = get_field ("banner_right_img");
$hero_img_testimony = get_field ("hero_img_testimony");
$hero_testimony_description = get_field ("hero_testimony_description");
$hero_testimony_Name = get_field ("hero_testimony_Name");
$hero_testimony_Role = get_field ("hero_testimony_Role");
$plan_suggest = get_field ("plan_suggest", 'options');
$hero_icon_left = get_field ("hero_icon_left");
$domain_subheading = get_field ("domain_subheading",'options');
$domain_heading = get_field ("domain_heading",'options');
$domain_serach_img = get_field ("domain_serach_img",'options');
$domain_suggest_text = get_field ("domain_suggest_text",'options');
$domain_suggest_list = get_field ("domain_suggest_list",'options');
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

$faq_subheading = get_field ("faq_subheading");
$faq_heading = get_field ("faq_heading");
$faq_list = get_field ("faq_list");
$faq_list2 = get_field ("faq_list2");

$case_study_subheading = get_field ("case_study_subheading");
$case_study_heading = get_field ("case_study_heading");
$case_study_list = get_field ("case_study_list");

$scan_icon = get_field("scan_icon", 'options');
$landingpage_header_logo = get_field("landingpage_header_logo", 'options');


$form_heading = get_field ("form_heading");
$form_heading_span = get_field ("form_heading_span");
$form_description = get_field ("form_description");
$form_heading_list = get_field ("form_heading_list");
$form_listing = get_field ("form_listing");
?>



<style>
.f40{
font-size: 40px;
}
.f20{
font-size: 20px;
}
.form-scans .text-center input[type="submit"] {
    width: 100% !important;
  
}

.form-scans .form-group input {
    width: 100% !important;
}

.report-container {
    max-width: 630px; /* Limit the maximum width */
    width: 100%; /* Allow container to shrink on smaller screens */
    border-radius: 8px;
    overflow: hidden; /* Hide overflow for rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.report-header {
    background-color: #3498db; /* Blue background */
    color: white;
    text-align: center;
    padding: 40px;
}

.report-header h2 {
    margin: 0 0 5px 0;
    font-size: 1.8em;
}

.report-header p {
    margin: 0;
    font-size: 1em;
    opacity: 0.9;
}

.report-content {
    background-color: #f6f6f6; /* Dark background */
    color: #ccc; /* Light grey text */
    padding: 30px;
}

.report-description {
    margin-top: 0;
    margin-bottom: 25px;
    line-height: 1.6;
    text-align: center;
    font-size: 14px;
color: #000;
}

.report-form {
    display: flex;
    flex-direction: column; /* Stack form elements vertically */
    gap: 15px; /* Space between form elements */
    margin-bottom: 30px;
}

.report-form input {
    padding: 12px 15px;
    border: none;
    border-radius: 5px;
    font-size: 1em;
    background-color: #fff; /* White input background */
    color: #333;
}

.report-form input::placeholder {
    color: #999;
}

.report-form button {
    background-color: #3498db; /* Blue button */
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
}

.report-form button:hover {
    background-color: #2980b9; /* Darker blue on hover */
}

.features-heading {
    color: #000;
    text-align: center;
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 1.3em;
}

.features-list {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap to the next row */
    gap: 15px; /* Space between feature items */
    justify-content: space-between; /* Distribute items */
}

.feature-item {
    display: flex; /* Use flex for icon and text alignment */
    align-items: center; /* Vertically center icon and text */
    flex-basis: calc(50% - 7.5px); /* Two items per row, accounting for gap */
    font-size: 14px;
color: #000;
}

.checkbox-icon {
    color: #2ecc71; /* Green color for the checkmark */
    margin-right: 8px;
    font-weight: bold;
}

/* Responsive adjustments */
@media (max-width: 500px) {
    .report-content {
        padding: 20px; /* Reduce padding on smaller screens */
    }

    .report-header h2 {
         font-size: 1.5em; /* Reduce heading size */
    }

    .report-header p {
        font-size: 0.9em; /* Reduce subtitle size */
    }

    .report-description {
        font-size: 0.9em; /* Reduce description font size */
    }

    .features-list {
        flex-direction: column; /* Stack feature items vertically */
        gap: 10px; /* Adjust gap */
    }

    .feature-item {
        flex-basis: 100%; /* Each item takes full width */
    }
}
.flex-center{
display: flex
;
    align-items: center;
}
.location-container {
    display: flex; /* Arrange items in a row */
    align-items: center; /* Vertically center the items */
    /* Add some basic styling like padding or margin if needed */
    padding: 10px;
}

.location-icon {
    /* Set size for the icon */
    width: 42px;
    height: 42px;
    /* Add space between the icon and the text */
    margin-right: 8px;
}

.location-text {
    /* Style the text */
    font-size: 1em;
    color: #555; /* Example text color */
}
.py-40{
padding-top: 40px;
padding-bottom: 80px;
}

.testimonial-image img {
    max-width: unset !important;
}

.testimonial-container {
    display: flex; /* Arrange items in a row */
    align-items: center; /* Vertically align items to the center */
 
}

.testimonial-image {
    margin-right: 20px; /* Space between image and text */
}

.testimonial-image img {
    width: 100px; /* Set image width */
    height: 100px; /* Set image height */
    border-radius: 50%; /* Make the image circular */
    object-fit: cover; /* Crop the image to fit the circle */
}

.testimonial-text {
    flex-grow: 1; /* Allow the text block to take up available space */
    margin-right: 20px; /* Space between text and author info */
    color: #555; /* Darker grey for text */
    line-height: 1.6; /* Improve readability */
}

.testimonial-author {
    text-align: left; /* Right-align the author info */
    min-width: 150px; /* Ensure author block has minimum width */
}

.author-name {
    font-weight: bold;
    color: #333; /* Dark grey for name */
    margin-bottom: 5px;
}

.author-title {
    color: #777; /* Lighter grey for title */
    font-size: 0.9em;
}

/* Responsive adjustments */
@media (max-width: 768px) { /* Adjust breakpoint as needed */
    .testimonial-container {
        flex-direction: column; /* Stack items vertically on smaller screens */
        text-align: center; /* Center text content */
    }

    .testimonial-image {
        margin-right: 0; /* Remove right margin */
        margin-bottom: 20px; /* Add space below the image */
    }

    .testimonial-text {
        margin-right: 0; /* Remove right margin */
        margin-bottom: 20px; /* Add space below text */
        text-align: center; /* Center text */
    }

    .testimonial-author {
        text-align: center; /* Center author info */
    }
}
.testimony-hero{
border-radius: 10px;
    border: 1px solid hsl(0deg 0% 58% / 20%);
    padding: 20px 20px;
}
.text-span{
color: #535353;
}
.top-d{
margin-top: 40px;
}
.list-check li:before {
    content: none !important;
    position: absolute;
    left: 0;
    top: 0;
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    font-variant: normal;
    color: #2a9bd5;
}


.hero-banner h1 {
    color: var(--Title-Grey, #535353);
    font-size: 50px;
    font-style: normal;
    font-weight: 800;
width: 600px;
    line-height: 58px;
    position: relative;
    padding-bottom: 40px;
    background: url(https://wordpresshealth.com/wp-content/themes/wordpresshealth/images/underline.png) no-repeat left bottom;
    margin-bottom: 18px;
    margin-top: 0;
}
.sky-bluee{
background: #204E82;
padding-top: 10px;
    padding-bottom: 20px;
}
#masthead{
display: none !important;
}
.wpcf7-spinner{
display: none !important;
}
.form-group input{
width: 867px;
    border-radius: 50px;
    padding: 10px 30px;
}
.form-scan{
margin-top: 20px;
}
.text-center input[type="submit"] {
width: 867px;
    border-radius: 50px;
    padding: 15px 30px;
    border: none !important;
    border-color: #2a9bd5 #2a9bd5 #2a9bd5 !important;
    background: #2a9bd5;
    color: #fff;
}
@media (max-width: 768px) {
  .form-group input,
  .text-center input[type="submit"] {
    width: 100%;
  }
.user-img{
    display: flex;
    align-content: center;
    justify-content: center;
    align-items: center;
}

  .hero-banner h1 {
    color: var(--Title-Grey, #535353);
    font-size: 28px;
    font-style: normal;
    font-weight: 800;
    width: 100%;
    line-height: 36px;
    position: relative;
    padding-bottom: 40px;
    background: url(https://wordpresshealth.com/wp-content/themes/wordpresshealth/images/underline.png) no-repeat left bottom;
    margin-bottom: 18px;
    margin-top: 0;
    background-size: contain; /* optional for better scaling on small screens */
  }



  .report-form {
    order: 2; /* move form after features on mobile */
  }

  .features-heading {
    order: 1;
  }

  .features-list {
    order: 1;
  }

  .report-content {
    display: flex;
    flex-direction: column;
  }
.form-scans{
margin-top: 40px;
}
.heading-footer {
    text-align: center;
    display: flex;
    gap: 20px;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
    flex-direction: column;
}
.f40 {
    font-size: 30px;
}

}
.white{
color: #fff;
}
.heading-footer{
text-align: center;
    display: flex;
    gap: 20px;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
}

.case-study.animation-card:hover {
  cursor: pointer;
}
.animation-card:hover {
    transform: translateY(-5px);
    transition: all ease .3s;
     box-shadow: none !important;
}

#faq {
    background: #F8F8F8;
}
#colophon{
display: none !important;
}
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

.blue a.btn.theme-btn.outline-btn.me-3.me-md-4.close-popup:hover {
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

a.btn.theme-btn.outline-btn.show-plan.blue {
    border-color: #204e82!important;
    color: #204e82!important;
}
a.btn.theme-btn.outline-btn.show-plan.blue:hover {
    background-color: #204e82 !important;
    color: #ffff!important;
}

.heading-report {
    max-width: 100%;
    margin: auto;
}

@media (max-width: 767px) {
    .mobile_hide {
        display: none !important;
    }
}

.protection{
padding-right: 40px;
}

.list-check.inline-list {
  
    margin-bottom: 40px !important;
}


</style> 
<section class="sky-bluee">
    <div class="container-fluid">
        <img src="<?php echo $landingpage_header_logo ?>" alt="">
    </div>
</section>
<section class="light-gray-bg py-40">
    <div class="container-fluid">
        <!-- The row and column classes create the responsive layout -->
        <div class="row row-gap-4 ">
            <!-- This column will take 12 columns on small screens and 7 on large screens -->
            <div class="col-12 col-lg-6 protection">
                <div class="hero-banner">
                    <div class="heading-text text-span flex-center">
                        <?php if ($hero_icon_left) : ?>
                            <div class="location-container">
                                <img src="<?php echo esc_url($hero_icon_left); ?>" alt="Location Icon" class="location-icon" />
                            </div>
                        <?php endif; ?>

                        <?php if ($hero_banner_subheading): ?>
                            <span class="location-text"><?php echo $hero_banner_subheading; ?></span>
                        <?php endif; ?>
                    </div>

                    <?php if ($hero_banner_headind): ?>
                        <h1><?php echo $hero_banner_headind; ?> <span class="theme-color"><?php echo $hero_banner_heading_span; ?></span></h1>
                    <?php endif; ?>

                    <?php if ($hero_banner_description): ?>
                        <p><?php echo $hero_banner_description; ?></p>
                    <?php endif; ?>

                    <?php if ($icon_hero_list): ?>
                        <ul class="list-check inline-list top-d">
                            <?php if (have_rows('icon_hero_list')): ?>
                                <?php while (have_rows('icon_hero_list')): the_row(); ?>
                                    <?php
                                        $icon_hero = get_sub_field('icon-hero');
                                    ?>
                                    <li> <img src="<?php echo $icon_hero; ?>" alt="" /></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>

                    <?php $hero_img_testimony = get_field("hero_img_testimony"); ?>
                    <div class="testimony-hero">
                        <div class="testimonial-container">
                            <?php if ($hero_img_testimony) : ?>
                                <div class="testimonial-image">
                                    <img src="<?php echo esc_url($hero_img_testimony); ?>" alt="Testimonial Image" />
                                </div>
                            <?php endif; ?>

                            <div class="testimonial-text">
                                <?php if ($hero_testimony_description): ?>
                                    <p><?php echo $hero_testimony_description; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="testimonial-author">
                                <?php if ($hero_testimony_Name): ?>
                                    <p class="author-name"><?php echo $hero_testimony_Name; ?></p>
                                <?php endif; ?>
                                <?php if ($hero_testimony_Role): ?>
                                    <p class="author-title"><?php echo $hero_testimony_Role; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- This column will take 12 columns on small screens and 5 on large screens -->
            <div class="col-12 col-lg-6">
                <div class="report-container">
                    <div class="report-header">
    <?php if ($form_heading): ?>
                        <h2><?php echo $form_heading; ?> </h2>
                    <?php endif; ?>
                     <?php if ($form_heading_span): ?>
                        <p><?php echo $form_heading_span; ?> </p>
                    <?php endif; ?>
                     
                    </div>
                    <div class="report-content">
  <?php if ($form_description): ?>
                       <p class="report-description"><?php echo $form_description; ?> </p>
                    <?php endif; ?>
                      
                        <div class="report-form">
                             <div class="form-scans">
                                <?php echo do_shortcode('[contact-form-7 id="07e9b0e" title="Scan Website"]'); ?>
                            </div>
                        </div> <?php if ($form_heading_list): ?>
                      <h3 class="features-heading"><?php echo $form_heading_list; ?> </h3>
                    <?php endif; ?>
                      
                     <?php if ($form_listing): ?>
    <div class="features-list">
        <?php foreach ($form_listing as $item): ?>
            <div class="feature-item">
                <span class="checkbox-icon">✓</span> <?php echo esc_html($item['form_list_text']); ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  

    <section class="choose-sec py-70 pb-0 mt-lg-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="heading-report">
                        <div class="heading text-center">
                        <h2><?php echo get_field('report_heading', 'option'); ?></h2>
                           <span><?php echo get_field('report_sub_heading', 'option'); ?></span>

                           
                        </div>
                    </div>
                    <ul class="list-choose">
                        <?php if( have_rows('report_list', 'options') ): ?>
                            <?php while( have_rows('report_list', 'options') ) : the_row(); ?>
                            <?php 
                                $report_icon = get_sub_field('report_icon');
                                $report_list_heading = get_sub_field('report_list_heading');
                                $report_list_description = get_sub_field('report_list_description');
                            ?>
                            <li>
                                <span class="icon"><img src="<?php echo $report_icon ?>" alt="" /></span>
                                <h4><?php echo $report_list_heading; ?></h4>
                                <p><?php echo $report_list_description; ?></p>
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
    
    
<?php if ( have_rows('faq') ) : ?>
    <?php while ( have_rows('faq') ) : the_row(); ?>

        <?php if ( get_row_layout() == 'faq_section' ): ?>    
            <?php get_template_part('blocks/faq-landing'); ?>
        <?php endif; ?>   

    <?php endwhile; ?>
<?php endif; ?>


    <section class="case-study py-4 py-lg-5">
        <div class="container">
            <div class="row row-gap-4 row-gap-5">
                <div class="col-12">
                   <div class="heading text-center">
                      
                       <h2><?php echo $case_study_heading ?></h2>
                        <span><?php echo $case_study_subheading ?></span>
                   </div> 
                   <div class="team-group">
                       <div class="row row-gap-4 row-gap-lg-5">
                        <?php if( have_rows('case_study_list') ): ?>
                            <?php while( have_rows('case_study_list') ) : the_row(); ?>
                            <?php
                                $case_study_img = get_sub_field('case_study_img');
                               
                            ?>
                           <div class="col-12 col-sm-6 col-md-4">
                               <div class="case-study animation-card">
                                   <div class="user-img">
                                       <img src="<?php echo $case_study_img ?>" alt="case-study">
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
              
            </div>
        </div>
    </section> 
    <section class="gradient-color sec-team py-140 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="heading text-center">
                        
                        <h2><?php echo $team_heading ?></h2>
                        <span><?php echo $team_sub_heading ?></span>
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


<section class="blue-bg" style="padding-top: 70px; padding-bottom: 70px; padding: 40px 0;">
        <div class="container my-lg-2">
            <div class="row row-gap-4 align-items-center">
                <div class="col-12 text-center">
                    <div class="heading-footer">
                        <span><img src="<?php echo $scan_icon ?>" alt=""></span>
                      
                         <h2 class="white f40"><?php echo get_field('scan_heading', 'option'); ?></h2>
                          
                    </div>
 <span class="white f20"><?php echo get_field('scan_sub_heading', 'option'); ?></span>
                   
                </div>
                  <div class="form-scan">
                                <?php echo do_shortcode('[contact-form-7 id="07e9b0e" title="Scan Website"]'); ?>
                            </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>