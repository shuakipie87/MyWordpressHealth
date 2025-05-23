<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordpressHealth
 */

get_header();
$heading = get_field('heading', 'options');
$sub_heading = get_field('sub_heading', 'options');
$error_message = get_field('error_message', 'options');
$home_text = get_field('home_text', 'options');
$home_text_link = get_field('home_text_link', 'options');
?>

	<main id="primary" class="site-main">

	<section class="error-404 not-found py-5 not-found-page">
		<div class="container">
			<div class="row align-items-center justify-content-center">
                 <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-5">
                    <div class="caption text-center">
						<?php
						if ( $error_message ) :
						if ( $heading && $sub_heading ) :
						echo '<h2>' . esc_html( $heading ) . '</h2>';
						echo '<h4>' . esc_html( $sub_heading ) . '</h4>';
						endif;
						echo '<p>' . esc_html( $error_message ) . '</p>';
						if ( $home_text && $home_text_link ) :
						echo '<a class="btn theme-btn btn-small" href="' . esc_url( $home_text_link ) . '">' . esc_html( $home_text ) . '</a>';
						endif;
						else :
						esc_html_e( 'Oops! That page can&rsquo;t be found...', 'Market Place' );
						endif;
						?>
                    </div>
                 </div>
			</div>
		</div>
	</section>

	</main><!-- #main -->

<?php
get_footer();
