<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordpressHealth
 */
$sign_button = get_field("sign_button", 'options');
$sign_button_link = get_field("sign_button_link", 'options');
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>



<style>
 html,
      body {
        overflow-x: hidden;
      }
    .flex {
        display: flex;
    }

    .flex-justify--end {
        justify-content: flex-end;
    }

    .flex-justify--between {
        justify-content: space-between;
    }

    .flex-align--center {
        align-items: center;
    }

    .grid {
        display: grid;
    }

    .grid--2 {
        grid-template-columns: 1fr 1fr;
    }

    .main--wrapper {
        background: #204E82;
        position: relative;
    }


    .main--wrapper .overflow-menu {
        transition: 1s all ease;
        transform: translateX(100%);
        top: 0;
        left: 0;
        position: absolute;
        width: 100%;
        background-color: #204E82;

    }

    .main--wrapper .om--inner {
        height: 100vh;
        display: flex;
        align-items: center;
    }

    .main--wrapper.active .overflow-menu {
        transform: translateX(30%);
        transition: 1s transform ease;
    }

    .main--wrapper .main--content {
        transform: translateX(0) scale(1);
        transition: 1s transform ease;
        background: #fff;

    }

    .main--wrapper.active .main--content {
        transform: translate(-70%, 5%) scale(0.9);
        overflow-y: hidden;
        overflow-x: hidden;
        transition: 1s transform ease;
    }

    .main--wrapper .main--content__inner {
        height: 100vh;
        transition: height 1s ease;
    }

    .main--wrapper.active .main--content__inner {
        height: 80vh;
        transition: height 1s ease;

    }


    html.active-menu,
    .main--wrapper.active {
        overflow-x: hidden;
        overflow-y: hidden;
        height: 100vh;
    }

    .main--content .header .nav {
        display: none;
    }

    .burger-menu--wrapper {
        padding: 1rem;
        display: none;
    }

    .burger-menu {
        height: 15px;
        width: 30px;
        position: relative;
    }

    .burger-menu span {
        height: 3px;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: #2A9BD5;
    }

    .burger-menu span:nth-child(1) {
        top: 0;
    }

    .burger-menu span:nth-child(2) {
        top: 7px;
    }

    .burger-menu span:nth-child(1) {
        top: 14px;
    }

    .menu-menu-1-container ul {
        list-style-type: none;
    }
    .menu-menu-1-container ul li{
	margin-bottom: 20px;
}
    .menu-menu-1-container ul li a {
        color: #fff;
        font-family: Plus Jakarta Sans;
		text-decoration: none;
		position: relative;
		

    }
.menu-menu-1-container ul li a:before {
    content: '';
    width: 100%;
    height: 2px;
    position: absolute;
    background: white;
    bottom: -4px;
    left: 0;
    transform: scaleX(0); /* Initially invisible */
    transform-origin: center; /* Start animation from the center */
    transition: transform 0.3s ease-in-out;
}

.menu-menu-1-container ul li a:hover:before {
    transform: scaleX(1); /* Expand to full width */
}





/* Close Button Container */
.close-wrap {
    position: relative;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

/* Close Lines (Default) */
.close-line {
    position: absolute;
    width: 30px;
    height: 3px;
    background: white;
    border-radius: 2px;
    transition: transform 0.3s ease-in-out  1.2s;
}

/* First Line */
.close-line1 {
    transform: rotate(0deg) translateY(-8px)  1.2s;
}

/* Second Line */
.close-line2 {
    transform: rotate(0deg) translateY(8px)  1.2s;
}

/* When Active (Transforms into X with Animation) */
.main--wrapper.active .close-wrap .close-line1 {
    animation: close-line1-animation 1.2s ease-in-out forwards;
}

.main--wrapper.active .close-wrap .close-line2 {
    animation: close-line2-animation 1.2s ease-in-out forwards;
}

/* Keyframes for Smooth Animation */
@keyframes close-line1-animation {
    0% { transform: rotate(0deg) translateY(-8px); }
    100% { transform: rotate(45deg) translateY(0); }
}

@keyframes close-line2-animation {
    0% { transform: rotate(0deg) translateY(8px); }
    100% { transform: rotate(-45deg) translateY(0); }
}





    @media screen and (max-width: 991px) {
        .burger-menu--wrapper {
            display: block;
        }

        .site-header .nav-right {
            display: none !important;
        }

        .wrapper_x { 
            top: 10px;
            right: 52%;
            position: absolute;
        }

    }
</style>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'wordpresshealth'); ?></a>
        <div class="main--wrapper">
            <div class="overflow-menu">
                <div class="om--inner">
                    <div class="wrapper_x">
                    <div class="close-wrap">
                        <span class="close-line close-line1" role="presentation"></span>
                        <span class="close-line close-line2" role="presentation"></span>
                    </div>
                    </div>
                    <nav>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>
                    </nav>
                </div>
            </div>

            <div class="main--content">

                <div class="main--content__inner">
                    <header id="masthead" class="site-header">
                        <nav id="site-navigation" class="navbar navbar-expand-md">
                            <div class="container-fluid">
                                <div class="navbar-brand p-0">
                                    <?php
                                    the_custom_logo();
                                    if (is_front_page() && is_home()) :
                                    ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                    <?php
                                    else :
                                    ?>
                                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                    <?php
                                    endif;
                                    $wordpresshealth_description = get_bloginfo('description', 'display');
                                    if ($wordpresshealth_description || is_customize_preview()) :
                                    ?>
                                        <p class="site-description"><?php //echo $wordpresshealth_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                                    ?></p>
                                    <?php endif; ?>
                                </div><!-- .site-branding -->
                                <!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'wordpresshealth' ); 
                                                                                                                    ?></button> -->

                                <div class="burger-menu--wrapper flex flex-justify--end">
                                    <div class="burger-menu">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="nav-right d-flex align-items-center">
                                    <?php /*  <button class="navbar-toggler d-lg-none hamburger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                    <!-- <span class="navbar-toggler-icon"></span> -->
                                    <div class="bar"></div>
                                    <div class="bar"></div>
                                    <div class="bar"></div>
                                </button>  */ ?>

                                    <div class="navbar-collapse offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                                        <div class="offcanvas-header d-lg-none w-100">
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'menu-1',
                                                'menu_id'        => 'primary-menu',
                                            )
                                        );
                                        ?>
                                    </div>
                                    <div class="login">
                                        <!-- <a href="<?php echo $sign_button_link ?>" style="border-radius: 45px;"><?php echo $sign_button ?></a> -->
                                        <a href="<?php echo esc_url($sign_button_link); ?>" style="border-radius: 45px;"><?php echo esc_html($sign_button); ?></a>

                                    </div>
                                </div>
                            </div>
                        </nav><!-- #site-navigation -->
                    </header><!-- #masthead -->