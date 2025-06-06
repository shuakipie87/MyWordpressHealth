<?php
/**
 * Template: Dashboard Upgrade Widget.
 *
 * @package SmartCrawl
 */

namespace SmartCrawl;

use SmartCrawl\Services\Service;

$service   = Service::get( Service::SERVICE_SITE );
$is_member = $service->is_member();
if ( $is_member ) {
	return;
}
?>

<section
	id="<?php echo esc_attr( \SmartCrawl\Admin\Settings\Dashboard::BOX_UPGRADE ); ?>"
	class="sui-box wds-dashboard-widget">

	<div class="sui-box-header">
		<h2 class="sui-box-title">
			<span class="sui-icon-smart-crawl" aria-hidden="true"></span>
			<?php esc_html_e( 'SmartCrawl Pro', 'wds' ); ?>
		</h2>

		<span
			class="sui-tag sui-tag-pro sui-tooltip"
			data-tooltip="<?php esc_attr_e( 'Upgrade to SmartCrawl Pro', 'wds' ); ?>">
			<?php esc_html_e( 'Pro', 'wds' ); ?>
		</span>
	</div>

	<div class="sui-box-body">
		<p><?php esc_html_e( 'Get our full WordPress Search Engine Optimization suite with SmartCrawl Pro and additional benefits of a WPMU DEV membership.', 'wds' ); ?></p>

		<ul>
			<li><?php esc_html_e( 'Scheduled SEO Audits & URL Crawls', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Automatic linking', 'wds' ); ?></li>
			<li><?php esc_html_e( 'White label automated reporting', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Premium WordPress plugins', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Manage unlimited WordPress sites', 'wds' ); ?></li>
			<li><?php esc_html_e( '24/7 live WordPress support', 'wds' ); ?></li>
			<li><?php esc_html_e( 'The WPMU DEV guarantee', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Location Based Redirects', 'wds' ); ?></li>
		</ul>

		<a
			target="_blank" class="sui-button sui-button-purple"
			href="https://wpmudev.com/project/smartcrawl-wordpress-seo/?utm_source=smartcrawl&utm_medium=plugin&utm_campaign=smartcrawl_dashboard_upsellwidget_button">
			<?php esc_html_e( 'Upgrade to Pro', 'wds' ); ?>
		</a>
	</div>

</section>