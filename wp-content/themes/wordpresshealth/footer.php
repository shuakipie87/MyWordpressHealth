<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordpressHealth
 */
$get_started_heading = get_field("get_started_heading", 'options');
$partners_get_started_heading = get_field("partners_get_started_heading", 'options');
$get_started_description = get_field("get_started_description", 'options');
$get_started_button = get_field("get_started_button", 'options');
$get_started_button_link = get_field("get_started_button_link", 'options');
$get_started_partner_button_link = get_field("get_started_partner_button_link", 'options');
$resourse_heading = get_field("resourse_heading", 'options');
$quicklink_heading = get_field("quicklink_heading", 'options');
$contactnav_heading = get_field("contactnav_heading", 'options');
$contactnav_support = get_field("contactnav_support", 'options');
$contactnav_support_link = get_field("contactnav_support_link", 'options');
$contactnav_email = get_field("contactnav_email", 'options');
$contactnav_email_link = get_field("contactnav_email_link", 'options');
$footer_logo = get_field("footer_logo", 'options');
$copyright = get_field("copyright", 'options');
$facebook = get_field("facebook", 'options');
$facebook_link = get_field("facebook_link", 'options');
$linkedin = get_field("linkedin", 'options');
$linkedin_link = get_field("linkedin_link", 'options');

?>

<style>
	.newsletter-form input.wpcf7-submit {
		padding: 19px 30px !important;
		min-width: 168px;
	}

	.newsletter-form .text-center.text-md-end.mt-lg-2 {
		display: flex;
		justify-content: center;
	}
</style>



<footer id="colophon" class="site-footer py-4 py-md-5 pb-0 pb-md-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
				// Get the current Page ID
				$page_id = get_queried_object_id();

				// Default values

				$get_started_button = $get_started_button ?: "Get Started";
				$extra_class = "";
				$target_blank = "";

				// Check Page ID conditions
				if ($page_id == 251) {
					$footer_button_link = $get_started_partner_button_link; // Custom link for page 251
					$target_blank = ' target="_blank"'; // Open in new tab
					$extra_class = "sky-bg"; // Add sky-bg class
					$extra_text = $partners_get_started_heading; // Add text
				} else {
					$footer_button_link = $get_started_button_link;
					$extra_text = $get_started_heading;
				}

				?>

				<div class="footer-getstart blue-bg <?php echo esc_attr($extra_class); ?>">
					<div class="heading">
						<h2><?php echo esc_html($extra_text); ?></h2>
						<p><?php echo esc_html($get_started_description); ?></p>
					</div>

					<!-- Updated Button Code -->
					<a href="<?php echo esc_url($footer_button_link); ?>" class="btn theme-btn" <?php echo $target_blank; ?>>
						<?php echo esc_html($get_started_button); ?> <i class="fas fa-arrow-right"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="foter-menu">
			<div class="row row-gap-4">
				<div class="col-12 col-md-6 col-lg-3">
					<h4><?php echo $resourse_heading ?></h4>
					<?php wp_nav_menu(array(
						'theme_location' => 'resourse-menu',
						'container' => false,
					)); ?>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<h4><?php echo $quicklink_heading ?></h4>
					<?php wp_nav_menu(array(
						'theme_location' => 'quicklink-menu',
						'container' => false,
					)); ?>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<h4><?php echo $contactnav_heading ?></h4>
					<ul class="list-contact">
						<li><i class="fas fa-phone-volume"></i><a href="<?php echo $contactnav_support_link ?>"><?php echo $contactnav_support ?></a></li>
						<li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $contactnav_email_link ?>"><u><?php echo $contactnav_email ?></u></a></li>
					</ul>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="newsletter-form ">
						<?php echo do_shortcode('[contact-form-7 id="3138561" title="Contact Home"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row justify-content-center align-items-center row-gap-3">
				<div class="col-md-3">
					<div class="f-logo">
						<a href="https://wordpresshealth.com/"><img src="<?php echo $footer_logo ?>" alt=""></a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="copyright">
						<p>© <?php echo date('Y'); ?> <?php echo $copyright ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="f-social">
						<li><a href="<?php echo $facebook_link ?>" target="_blank"><?php echo $facebook ?></a></li>
						<li><a href="<?php echo $linkedin_link ?>" target="_blank"><?php echo $linkedin ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div>
</div>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.addEventListener('wpcf7mailsent', function(event) {
			if (event.detail.contactFormId == "145", "283", "282") {
				let form = event.target;
				let thankYouMessage = form.querySelector('.wpcf7-response-output');

				if (thankYouMessage) {
					setTimeout(function() {
						thankYouMessage.innerHTML =
							'<img src="<?php echo get_template_directory_uri(); ?>/images/thank-you.svg" alt="Thank You"><br> We WIll be in Touch Shortly';
						thankYouMessage.style.display = 'block'; // Ensure visibility
					}, 100); // Delay to allow CF7 processing
				}
			}
		}, false);
	});
</script>


<script>
	jQuery(document).ready(function($) {
		$(".burger-menu").on("click", function() {
			var $this = $(this);

			if ($this.hasClass("active")) {
				$this.removeClass("active");
				$this.closest(".main--wrapper").removeClass("active");
				$this.closest('html').removeClass('active-menu');

			} else {

				$this.closest('html').addClass('active-menu');
				$this.closest(".main--wrapper").addClass("active");
				$this.addClass("active");
			}
		});
	});

	jQuery(document).ready(function($) {
		$(".close-wrap").on("click", function() {
			var $this = $(this);

			if ($this.hasClass("active"))
				$this.removeClass("active");
				$this.closest(".main--wrapper").removeClass("active");
				$this.closest('html').removeClass('active-menu');

			
		});
	});


</script>
</body>

</html>