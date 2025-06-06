<?php
/**
 * On page settings
 *
 * @package SmartCrawl
 */

namespace SmartCrawl\Admin\Settings;

use SmartCrawl\Controllers\Assets;
use SmartCrawl\Settings;
use SmartCrawl\Simple_Renderer;
use SmartCrawl\Singleton;
use SmartCrawl\Entities;

/**
 * Class Onpage
 */
class Onpage extends Admin_Settings {

	use Singleton;

	const PT_ARCHIVE_PREFIX = 'pt-archive-';

	/**
	 * Validate submitted options
	 *
	 * @param array $input Raw input.
	 *
	 * @return array Validated input
	 */
	public function validate( $input ) {
		$result = array();

		// Setup.
		if ( ! empty( $input['wds_onpage-setup'] ) ) {
			$result['wds_onpage-setup'] = true;
		}

		foreach ( array( 'main_blog_archive', 'search', 'bp_groups', 'bp_profile' ) as $type ) {
			// Meta robots.
			if ( ! empty( $input[ "meta_robots-noindex-$type" ] ) ) {
				$result[ "meta_robots-noindex-$type" ] = true;
			}
			if ( ! empty( $input[ "meta_robots-nofollow-$type" ] ) ) {
				$result[ "meta_robots-nofollow-$type" ] = true;
			}
			if ( ! empty( $input[ "meta_robots-$type-subsequent_pages" ] ) ) {
				$result[ "meta_robots-$type-subsequent_pages" ] = true;
			}
		}

		$tax_options = $this->get_tax_options( '' );
		foreach ( $tax_options as $option => $_tax ) {
			$rbts = $this->get_robots_options_for( $option );
			if ( ! empty( $rbts ) && is_array( $rbts ) ) {
				foreach ( array_keys( $rbts ) as $item ) {
					if ( ! empty( $input[ $item ] ) ) {
						$result[ $item ] = true;
					}
				}
			}
		}
		$other_options = $this->get_other_types_options( '' );
		foreach ( $other_options as $option => $_tax ) {
			$rbts = $this->get_robots_options_for( $option );
			if ( ! empty( $rbts ) && is_array( $rbts ) ) {
				foreach ( array_keys( $rbts ) as $item ) {
					if ( ! empty( $input[ $item ] ) ) {
						$result[ $item ] = true;
					}
				}
			}
		}

		$archive_post_types = \smartcrawl_get_archive_post_types();
		foreach ( $archive_post_types as $archive_post_type ) {
			$archive_pt_robot_options = $this->get_robots_options_for( $archive_post_type );

			foreach ( array_keys( $archive_pt_robot_options ) as $archive_pt_robot_option ) {
				if ( ! empty( $input[ $archive_pt_robot_option ] ) ) {
					$result[ $archive_pt_robot_option ] = true;
				}
			}
		}

		// String values.
		$strings = array(
			'home',
			'search',
			'404',
			'bp_groups',
			'bp_profile',
		);
		foreach ( get_post_types( array( 'public' => true ) ) as $pt ) {
			$strings[] = $pt;
			// Allow post types robots noindex/nofollow.
			if ( ! empty( $input[ "meta_robots-noindex-{$pt}" ] ) ) {
				$result[ "meta_robots-noindex-{$pt}" ] = true;
			}
			if ( ! empty( $input[ "meta_robots-nofollow-{$pt}" ] ) ) {
				$result[ "meta_robots-nofollow-{$pt}" ] = true;
			}
		}
		$strings = array_merge( $strings, array_values( $tax_options ) );
		$strings = array_merge( $strings, array_values( $other_options ) );
		$strings = array_merge( $strings, $archive_post_types );

		foreach ( $strings as $str ) {
			if ( isset( $input[ "title-{$str}" ] ) ) {
				$result[ "title-{$str}" ] = \smartcrawl_sanitize_preserve_macros( $input[ "title-{$str}" ] );
			}
			if ( isset( $input[ "metadesc-{$str}" ] ) ) {
				$result[ "metadesc-{$str}" ] = \smartcrawl_sanitize_preserve_macros( $input[ "metadesc-{$str}" ] );
			}

			// OpenGraph.
			if ( isset( $input[ "og-active-{$str}" ] ) ) {
				$result[ "og-active-{$str}" ] = (bool) $input[ "og-active-{$str}" ];
			}
			if ( isset( $input[ "og-title-{$str}" ] ) ) {
				$result[ "og-title-{$str}" ] = \smartcrawl_sanitize_preserve_macros( $input[ "og-title-{$str}" ] );
			}
			if ( isset( $input[ "og-description-{$str}" ] ) ) {
				$result[ "og-description-{$str}" ] = \smartcrawl_sanitize_preserve_macros( $input[ "og-description-{$str}" ] );
			}

			$result[ "og-images-{$str}" ] = array();
			if ( ! empty( $input[ "og-images-{$str}" ] ) && is_array( $input[ "og-images-{$str}" ] ) ) {
				foreach ( $input[ "og-images-{$str}" ] as $img ) {
					$result[ "og-images-{$str}" ][] = is_numeric( $img ) ? intval( $img ) : esc_url( $img );
				}
			}
			$result[ "og-images-{$str}" ] = array_values( array_filter( array_unique( $result[ "og-images-{$str}" ] ) ) );
			if ( isset( $input[ "og-disable-first-image-{$str}" ] ) ) {
				$result[ "og-disable-first-image-{$str}" ] = (bool) $input[ "og-disable-first-image-{$str}" ];
			}

			// Twitter cards.
			if ( isset( $input[ "twitter-active-{$str}" ] ) ) {
				$result[ "twitter-active-{$str}" ] = (bool) $input[ "twitter-active-{$str}" ];
			}
			if ( isset( $input[ "twitter-title-{$str}" ] ) ) {
				$result[ "twitter-title-{$str}" ] = \smartcrawl_sanitize_preserve_macros( $input[ "twitter-title-{$str}" ] );
			}
			if ( isset( $input[ "twitter-description-{$str}" ] ) ) {
				$result[ "twitter-description-{$str}" ] = \smartcrawl_sanitize_preserve_macros( $input[ "twitter-description-{$str}" ] );
			}

			$result[ "twitter-images-{$str}" ] = array();
			if ( ! empty( $input[ "twitter-images-{$str}" ] ) && is_array( $input[ "twitter-images-{$str}" ] ) ) {
				foreach ( $input[ "twitter-images-{$str}" ] as $img ) {
					$result[ "twitter-images-{$str}" ][] = is_numeric( $img ) ? intval( $img ) : esc_url( $img );
				}
			}
			$result[ "twitter-images-{$str}" ] = array_values( array_filter( array_unique( $result[ "twitter-images-{$str}" ] ) ) );
			if ( isset( $input[ "twitter-disable-first-image-{$str}" ] ) ) {
				$result[ "twitter-disable-first-image-{$str}" ] = (bool) $input[ "twitter-disable-first-image-{$str}" ];
			}
		}

		$result['enable-author-archive'] = isset( $input['enable-author-archive'] ) && (bool) $input['enable-author-archive'];
		$result['enable-date-archive']   = isset( $input['enable-date-archive'] ) && (bool) $input['enable-date-archive'];

		if ( isset( $input['preset-separator'] ) ) {
			$result['preset-separator'] = sanitize_text_field( $input['preset-separator'] );
		}

		if ( isset( $input['separator'] ) ) {
			$result['separator'] = sanitize_text_field( $input['separator'] );
		}

		$result = $this->sanitize_and_include_char_lengths(
			$result,
			$input,
			'custom_title_char_lengths',
			'custom_title_min_length',
			'custom_title_max_length',
			\SMARTCRAWL_TITLE_DEFAULT_MIN_LENGTH,
			\SMARTCRAWL_TITLE_DEFAULT_MAX_LENGTH
		);

		$result = $this->sanitize_and_include_char_lengths(
			$result,
			$input,
			'custom_metadesc_char_lengths',
			'custom_metadesc_min_length',
			'custom_metadesc_max_length',
			\SMARTCRAWL_METADESC_DEFAULT_MIN_LENGTH,
			\SMARTCRAWL_METADESC_DEFAULT_MAX_LENGTH
		);

		return $result;
	}

	/**
	 * Sanitize and include character lengths.
	 *
	 * @param array  $result         Result data.
	 * @param array  $input          Input data.
	 * @param string $toggle_name    Toggle name.
	 * @param string $min_field_name Min field name.
	 * @param string $max_field_name Max field name.
	 * @param int    $default_min    Default min value.
	 * @param int    $default_max    Default max value.
	 *
	 * @return array
	 */
	private function sanitize_and_include_char_lengths( $result, $input, $toggle_name, $min_field_name, $max_field_name, $default_min, $default_max ) {
		$result[ $toggle_name ]  = ! empty( $input[ $toggle_name ] );
		$custom_title_min_length = (int) \smartcrawl_get_array_value( $input, $min_field_name );
		if ( $custom_title_min_length > 0 ) {
			$result[ $min_field_name ] = $custom_title_min_length;
		} else {
			$result[ $min_field_name ] = $default_min;
			add_settings_error( $this->option_name, 'min-limit-invalid', __( 'Min length invalid', 'wds' ) );
		}
		$custom_title_max_length = (int) \smartcrawl_get_array_value( $input, $max_field_name );
		if ( $custom_title_max_length ) {
			$result[ $max_field_name ] = $custom_title_max_length;
		} else {
			$result[ $max_field_name ] = $default_max;
			add_settings_error( $this->option_name, 'max-limit-invalid', __( 'Max length invalid', 'wds' ) );
		}

		return $result;
	}

	/**
	 * Spawn taxonomy options and names, indexed by taxonomy option names
	 *
	 * @param string $pfx Prefix options with this.
	 *
	 * @return array
	 */
	protected function get_tax_options( $pfx = '' ) {
		$pfx  = ! empty( $pfx ) ? rtrim( $pfx, '_' ) . '_' : $pfx;
		$opts = array();
		foreach ( get_taxonomies( array( '_builtin' => false ), 'objects' ) as $taxonomy ) {
			$name          = $pfx . str_replace( '-', '_', $taxonomy->name );
			$opts[ $name ] = $taxonomy->name;
		}

		return $opts;
	}

	/**
	 * Spawns a set of robots options for a given type.
	 *
	 * @param string $type                            Archives type to generate the robots options for.
	 * @param bool   $include_subsequent_pages_option Whether to include the subsequent pages option.
	 * @param string $context                         Context.
	 *
	 * @return array Generated meta robots option array.
	 */
	public static function get_robots_options_for( $type, $include_subsequent_pages_option = true, $context = '' ) {
		$options = array(
			"meta_robots-noindex-{$type}"  => array(
				'label'            => sprintf( '%s %s', esc_html__( 'Index', 'wds' ), $context ),
				'description'      => esc_html__( 'Disabling indexing means that this content will not be indexed and searchable in search engines.', 'wds' ),
				'inverted'         => true,
				'html_description' => self::sitemap_notice( $type ),
			),
			"meta_robots-nofollow-{$type}" => array(
				'label'       => sprintf( '%s %s', esc_html__( 'Follow', 'wds' ), $context ),
				'description' => esc_html__( 'Disabling following means search engines will not follow and crawl links it finds in this content.', 'wds' ),
				'inverted'    => true,
			),
		);

		if ( $include_subsequent_pages_option ) {
			$options[ 'meta_robots-' . $type . '-subsequent_pages' ] = array(
				'label'       => esc_html__( 'Apply to all pages except the first', 'wds' ),
				'description' => esc_html__( 'If you select this option, the first page will be left alone, but the indexing settings will be applied to subsequent pages.', 'wds' ),
			);
		}

		return $options;
	}

	/**
	 * Sitemap notice render.
	 *
	 * @param string $type Notice type.
	 *
	 * @return false|mixed|string
	 */
	private static function sitemap_notice( $type ) {
		$sitemap_enabled = \SmartCrawl\Sitemaps\Utils::sitemap_enabled();
		if ( ! $sitemap_enabled ) {
			return '';
		}

		$message = \smartcrawl_format_link(
		// translators: %s target.
			esc_html__( 'You might want to exclude this type from the %s as well.', 'wds' ),
			Admin_Settings::admin_url( Settings::TAB_SITEMAP ),
			esc_html__( 'sitemap', 'wds' )
		);
		$options = Settings::get_options();
		$indexed = empty( $options[ 'meta_robots-noindex-' . $type ] );
		$class   = 'sui-notice-info';
		if ( $indexed ) {
			$class .= ' hidden';
		}

		return Simple_Renderer::load(
			'notice',
			array(
				'class'   => $class,
				'message' => $message,
			)
		);
	}

	/**
	 * Spawn taxonomy options and names, indexed by taxonomy option names
	 *
	 * @param string $pfx Prefix options with this.
	 *
	 * @return array
	 */
	protected function get_other_types_options( $pfx = '' ) {
		$pfx         = ! empty( $pfx ) ? rtrim( $pfx, '_' ) . '_' : $pfx;
		$opts        = array();
		$other_types = array(
			'category',
			'post_tag',
			'author',
			'date',
		);
		foreach ( $other_types as $value ) {
			$name          = $pfx . $value;
			$opts[ $name ] = $value;
		}

		return $opts;
	}

	/**
	 * Retrieves other type context.
	 *
	 * @param string $prefix Prefix.
	 *
	 * @return array
	 */
	protected function get_other_types_options_context( $prefix = '' ) {
		$context_strings = array();
		foreach ( $this->get_other_types_options( '' ) as $option ) {
			$context = '';

			if ( in_array( $option, array( 'category', 'post_tag' ), true ) ) {
				$tax_object = get_taxonomy( $option );
				$context    = strtolower( $tax_object->label );
			} elseif ( 'author' === $option ) {
				$context = esc_html__( 'author archives', 'wds' );
			} elseif ( 'date' === $option ) {
				$context = esc_html__( 'date archives', 'wds' );
			}

			$context_strings[ $prefix . $option ] = $context;
		}

		return $context_strings;
	}

	/**
	 * Init the module.
	 *
	 * @return void
	 */
	public function init() {
		$this->option_name = 'wds_onpage_options';
		$this->name        = Settings::COMP_ONPAGE;
		$this->slug        = Settings::TAB_ONPAGE;
		$this->action_url  = admin_url( 'options.php' );
		$this->page_title  = sprintf(
		/* translators: %s: plugin title */
			__( '%s Wizard: Title & Meta', 'wds' ),
			\smartcrawl_get_plugin_title()
		);

		add_action( 'wp_ajax_wds-onpage-save-static-home', array( $this, 'json_save_static_homepage_meta' ) );
		// Deactivate action.
		add_action( 'wp_ajax_wds-deactivate-onpage-module', array( $this, 'deactivate_onpage_module' ) );

		parent::init();

		remove_action( 'admin_menu', array( $this, 'add_page' ) );
		add_action( 'admin_menu', array( $this, 'add_page' ), 94 );
	}

	/**
	 * Retrieves the title.
	 *
	 * @return string
	 */
	public function get_title() {
		return __( 'Title & Meta', 'wds' );
	}

	/**
	 * Save home page meta data.
	 *
	 * @return void
	 */
	public function json_save_static_homepage_meta() {
		$request_data = $this->get_request_data();
		$front_page   = get_post( (int) get_option( 'page_on_front' ) );

		$title = \smartcrawl_get_array_value( $request_data, array( 'wds_onpage_options', 'title-static-home' ) );
		if ( $title ) {
			update_post_meta( $front_page->ID, '_wds_title', \smartcrawl_sanitize_preserve_macros( $title ) );
		} else {
			delete_post_meta( $front_page->ID, '_wds_title' );
		}

		$description = \smartcrawl_get_array_value(
			$request_data,
			array(
				'wds_onpage_options',
				'metadesc-static-home',
			)
		);
		if ( $description ) {
			update_post_meta( $front_page->ID, '_wds_metadesc', \smartcrawl_sanitize_preserve_macros( $description ) );
		} else {
			delete_post_meta( $front_page->ID, '_wds_metadesc' );
		}

		$metabox = \SmartCrawl\Admin\Metabox::get();
		$metabox->save_opengraph_meta( $front_page->ID, stripslashes_deep( $request_data['wds-opengraph'] ) );
		$metabox->save_twitter_post_meta( $front_page->ID, stripslashes_deep( $request_data['wds-twitter'] ) );
		$metabox->save_robots_meta( $front_page, $request_data );

		wp_send_json( array( 'success' => true ) );
	}

	/**
	 * Add admin settings page
	 */
	public function options_page() {
		parent::options_page();

		$arguments = array(
			'meta_robots_main_blog_archive' => self::get_robots_options_for( 'main_blog_archive', true, esc_html__( 'this website', 'wds' ) ),
		);

		foreach ( $this->get_tax_options( 'meta_robots_' ) as $option => $tax ) {
			$tax        = str_replace( '-', '_', $tax );
			$tax_object = get_taxonomy( $tax );
			if ( empty( $arguments[ $option ] ) ) {
				$tax_label            = empty( $tax_object->label ) ? '' : $tax_object->label;
				$arguments[ $option ] = self::get_robots_options_for( $tax, true, strtolower( $tax_label ) );
			}
		}

		foreach ( $this->get_other_types_options( 'meta_robots_' ) as $option => $value ) {
			$context_strings = $this->get_other_types_options_context( 'meta_robots_' );
			if ( empty( $arguments[ $option ] ) ) {
				$arguments[ $option ] = self::get_robots_options_for( $value, true, \smartcrawl_get_array_value( $context_strings, $option ) );
			}
		}

		$archive_post_types = \smartcrawl_get_archive_post_type_labels();
		foreach ( $archive_post_types as $archive_post_type => $archive_post_type_label ) {
			// translators: %s post type.
			$pt_archive_context = sprintf( esc_html__( '%s archive', 'wds' ), strtolower( $archive_post_type_label ) );

			$arguments['archive_post_type_robots'][ $archive_post_type ] = self::get_robots_options_for( $archive_post_type, true, $pt_archive_context );
		}
		$arguments['archive_post_types'] = $archive_post_types;

		$arguments['meta_robots_search'] = self::get_robots_options_for(
			'search',
			false,
			esc_html__( 'search page', 'wds' )
		);

		// Allows for post type options.
		foreach ( get_post_types( array( 'public' => true ), 'objects' ) as $post_type ) {
			$arguments['post_robots'][ $post_type->name ] = self::get_robots_options_for( $post_type->name, false, strtolower( $post_type->label ) );
		}

		$arguments['radio_options'] = array(
			__( 'No', 'wds' ),
			__( 'Yes', 'wds' ),
		);

		$arguments['engines'] = array(
			'ping-google' => __( 'Google', 'wds' ),
			'ping-bing'   => __( 'Bing', 'wds' ),
		);

		$arguments['separators'] = \smartcrawl_get_separators();

		$static_homepage           = 'page' === get_option( 'show_on_front' );
		$front_page                = get_post( (int) get_option( 'page_on_front' ) );
		$show_static_home_settings = $static_homepage && $front_page;

		$arguments['front_page']                = $front_page;
		$arguments['front_page_notice']         = $this->static_frontpage_notice( $front_page );
		$arguments['show_static_home_settings'] = $show_static_home_settings;
		$default_tab                            = $show_static_home_settings ? 'tab_static_homepage' : 'tab_homepage';

		$arguments['active_tab'] = $this->get_active_tab( $default_tab );

		$arguments['meta_robots_bp_groups'] = self::get_robots_options_for(
			'bp_groups',
			false,
			esc_html__( 'BuddyPress groups', 'wds' )
		);

		$arguments['meta_robots_bp_profile'] = self::get_robots_options_for(
			'bp_profile',
			false,
			esc_html__( 'BuddyPress profile', 'wds' )
		);

		wp_enqueue_script( Assets::ONPAGE_JS );
		$this->render_page( 'onpage/onpage-settings', $arguments );
	}

	/**
	 * Static front page notice.
	 *
	 * @param \WP_Post|null $front_page Page ID.
	 *
	 * @return false|mixed
	 */
	private function static_frontpage_notice( $front_page ) {
		ob_start();
		esc_html_e( 'Your homepage is set to a static page, Homepage. You can edit your homepage meta from here, as well as in the WordPress editor for that page.', 'wds' );
		if ( $front_page ) {
			?>
			<br/>
			<a
				type="button"
				href="<?php echo esc_attr( get_edit_post_link( $front_page ) ); ?>"
				class="sui-button" style="margin-top: 10px"
			>
				<?php esc_html_e( 'Go To Homepage', 'wds' ); ?></a>
			<?php
		}

		return $this->load_view(
			'notice',
			array(
				'message' => ob_get_clean(),
				'class'   => 'sui-notice-info',
			)
		);
	}

	/**
	 * Retrieves singular macros.
	 *
	 * @param string $post_type Post type.
	 *
	 * @return array
	 */
	public static function get_singular_macros( $post_type = '' ) {
		$singular_macros = array(
			'%%id%%'               => __( 'Post/page ID', 'wds' ),
			'%%title%%'            => __( 'Title of the post/page', 'wds' ),
			'%%excerpt%%'          => __( 'Post/page excerpt (or auto-generated if it does not exist)', 'wds' ),
			'%%excerpt_only%%'     => __( 'Post/page excerpt (without auto-generation)', 'wds' ),
			'%%modified%%'         => __( 'Post/page modified time', 'wds' ),
			'%%date%%'             => __( 'Date of the post/page', 'wds' ),
			'%%name%%'             => __( "Post/page author's 'nicename'", 'wds' ),
			'%%userid%%'           => __( "Post/page author's userid", 'wds' ),
			'%%user_description%%' => __( "Post/page author's description", 'wds' ),
		);

		if ( empty( $post_type ) || 'attachment' === $post_type ) {
			$singular_macros['%%caption%%'] = __( 'Attachment caption', 'wds' );
		}

		if ( empty( $post_type ) || 'post' === $post_type ) {
			$singular_macros['%%category%%'] = __( 'Post categories (comma separated)', 'wds' );
			$singular_macros['%%tag%%']      = __( 'Current tag/tags', 'wds' );
		}

		return $singular_macros;
	}

	/**
	 * Retrieves term macros.
	 *
	 * @param string $taxonomy Taxonomy.
	 *
	 * @return array
	 */
	public static function get_term_macros( $taxonomy = '' ) {
		$term_macros = array(
			'%%id%%'               => __( 'Term ID', 'wds' ),
			'%%term_title%%'       => __( 'Term name', 'wds' ),
			'%%term_description%%' => __( 'Term description', 'wds' ),
		);

		if ( empty( $taxonomy ) || 'category' === $taxonomy ) {
			$term_macros['%%category%%']             = __( 'Category name', 'wds' );
			$term_macros['%%category_description%%'] = __( 'Category description', 'wds' );
		}

		if ( empty( $taxonomy ) || 'post_tag' === $taxonomy ) {
			$term_macros['%%tag%%']             = __( 'Tag name', 'wds' );
			$term_macros['%%tag_description%%'] = __( 'Tag description', 'wds' );
		}

		return $term_macros;
	}

	/**
	 * Retrieves general macros.
	 *
	 * @return array
	 */
	public static function get_general_macros() {
		return array(
			'%%sep%%'              => __( 'Separator', 'wds' ),
			'%%sitename%%'         => __( "Site's name", 'wds' ),
			'%%sitedesc%%'         => __( "Site's tagline / description", 'wds' ),
			'%%page%%'             => __( 'Current page number (i.e. page 2 of 4)', 'wds' ),
			'%%pagetotal%%'        => __( 'Current page total', 'wds' ),
			'%%pagenumber%%'       => __( 'Current page number', 'wds' ),
			'%%spell_pagenumber%%' => __( 'Current page number, spelled out as numeral in English', 'wds' ),
			'%%spell_pagetotal%%'  => __( 'Current page total, spelled out as numeral in English', 'wds' ),
			'%%spell_page%%'       => __( 'Current page number, spelled out as numeral in English', 'wds' ),
			'%%currenttime%%'      => __( 'Current time', 'wds' ),
			'%%currentdate%%'      => __( 'Current date', 'wds' ),
			'%%currentmonth%%'     => __( 'Current month', 'wds' ),
			'%%currentyear%%'      => __( 'Current year', 'wds' ),
		);
	}

	/**
	 * Retrieves BP profile macros.
	 *
	 * @return array
	 */
	public static function get_bp_profile_macros() {
		return array(
			'%%bp_user_username%%'  => __( 'BuddyPress username', 'wds' ),
			'%%bp_user_full_name%%' => __( "BuddyPress user's full name", 'wds' ),
		);
	}

	/**
	 * Retrieves BP group macros.
	 *
	 * @return array
	 */
	public static function get_bp_group_macros() {
		return array(
			'%%bp_group_name%%'        => __( 'BuddyPress group name', 'wds' ),
			'%%bp_group_description%%' => __( 'BuddyPress group description', 'wds' ),
		);
	}

	/**
	 * Retrieves post type archive macros.
	 *
	 * @return array
	 */
	public static function get_pt_archive_macros() {
		return array(
			'%%pt_plural%%' => __( 'Post type label plural', 'wds' ),
			'%%pt_single%%' => __( 'Post type label singular', 'wds' ),
		);
	}

	/**
	 * Retrieves search macros.
	 *
	 * @return array
	 */
	public static function get_search_macros() {
		return array(
			'%%searchphrase%%' => __( 'Current search phrase', 'wds' ),
		);
	}

	/**
	 * Retrieves author macros.
	 *
	 * @return array
	 */
	public static function get_author_macros() {
		return array(
			'%%name%%'             => __( "Author's 'nicename'", 'wds' ),
			'%%userid%%'           => __( "Author's userid", 'wds' ),
			'%%user_description%%' => __( "Author's description", 'wds' ),
		);
	}

	/**
	 * Retrieves date macros.
	 *
	 * @return array
	 */
	public static function get_date_macros() {
		return array(
			'%%date%%' => __( 'Date of the archive', 'wds' ),
		);
	}

	/**
	 * Default settings.
	 */
	public function defaults() {
		$this->options = get_option( $this->option_name, array() );

		if ( empty( $this->options['title-home'] ) ) {
			$this->options['title-home'] = '%%sitename%%';
		}

		if ( empty( $this->options['metadesc-home'] ) ) {
			$this->options['metadesc-home'] = '%%sitedesc%%';
		}

		if ( empty( $this->options['onpage-stylesheet'] ) ) {
			$this->options['onpage-stylesheet'] = 0;
		}

		if ( empty( $this->options['onpage-dashboard-widget'] ) ) {
			$this->options['onpage-dashboard-widget'] = 1;
		}

		if ( empty( $this->options['onpage-disable-automatic-regeneration'] ) ) {
			$this->options['onpage-disable-automatic-regeneration'] = 0;
		}

		foreach ( get_post_types( array( 'public' => true ) ) as $posttype ) {
			if ( in_array( $posttype, array( 'revision', 'nav_menu_item' ), true ) ) {
				continue;
			}
			if ( preg_match( '/^upfront_/', $posttype ) ) {
				continue;
			}

			$type_obj = get_post_type_object( $posttype );
			if ( ! is_object( $type_obj ) ) {
				continue;
			}

			if ( empty( $this->options[ 'title-' . $posttype ] ) ) {
				$this->options[ 'title-' . $posttype ] = '%%title%% %%sep%% %%sitename%%';
			}

			if ( empty( $this->options[ 'metadesc-' . $posttype ] ) ) {
				$this->options[ 'metadesc-' . $posttype ] = '%%excerpt%%';
			}
		}

		foreach ( \smartcrawl_get_archive_post_types() as $archive_post_type ) {
			if ( empty( $this->options[ 'title-' . $archive_post_type ] ) ) {
				$this->options[ 'title-' . $archive_post_type ] = '%%pt_plural%% %%sep%% %%sitename%%';
			}
		}

		foreach ( get_taxonomies( array( '_builtin' => false ), 'objects' ) as $taxonomy ) {
			if ( empty( $this->options[ 'title-' . $taxonomy->name ] ) ) {
				$this->options[ 'title-' . $taxonomy->name ] = '%%term_title%% %%sep%% %%sitename%%';
			}

			if ( empty( $this->options[ 'metadesc-' . $taxonomy->name ] ) ) {
				$this->options[ 'metadesc-' . $taxonomy->name ] = '%%term_description%%';
			}
		}

		$other_types = array(
			'category'   => array(
				'title' => '%%category%% %%sep%% %%sitename%%',
				'desc'  => '%%category_description%%',
			),
			'post_tag'   => array(
				'title' => '%%tag%% %%sep%% %%sitename%%',
				'desc'  => '%%tag_description%%',
			),
			'author'     => array(
				'title' => '%%name%% %%sep%% %%sitename%%',
				'desc'  => '%%user_description%%',
			),
			'date'       => array(
				'title' => '%%date%% %%sep%% %%sitename%%',
				'desc'  => '',
			),
			'search'     => array(
				'title' => '%%searchphrase%% %%sep%% %%sitename%%',
				'desc'  => '',
			),
			'404'        => array(
				'title' => 'Page not found %%sep%% %%sitename%%',
				'desc'  => '',
			),
			'bp_groups'  => array(
				'title' => '%%bp_group_name%% %%sep%% %%sitename%%',
				'desc'  => '%%bp_group_description%%',
			),
			'bp_profile' => array(
				'title' => '%%bp_user_username%% %%sep%% %%sitename%%',
				'desc'  => '%%bp_user_full_name%%',
			),
		);

		foreach ( $other_types as $key => $value ) {
			if ( empty( $this->options[ 'title-' . $key ] ) ) {
				$this->options[ 'title-' . $key ] = $value['title'];
			}

			if ( empty( $this->options[ 'metadesc-' . $key ] ) ) {
				$this->options[ 'metadesc-' . $key ] = $value['desc'];
			}
		}

		if ( ! isset( $this->options['preset-separator'] ) ) {
			$this->options['preset-separator'] = 'pipe';
		}

		if ( ! isset( $this->options['separator'] ) ) {
			$this->options['separator'] = '';
		}

		if ( ! isset( $this->options['enable-author-archive'] ) ) {
			$this->options['enable-author-archive'] = false;
		}

		if ( ! isset( $this->options['enable-date-archive'] ) ) {
			$this->options['enable-date-archive'] = false;
		}

		update_option( $this->option_name, $this->options );
	}

	/**
	 * Retrieves request data.
	 *
	 * @return array
	 */
	private function get_request_data() {
		return isset( $_POST['_wds_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wds_nonce'] ) ), 'wds-onpage-nonce' ) ? $_POST : array();
	}

	/**
	 * Retrieves random post data.
	 *
	 * @return array
	 */
	public static function get_random_post_data() {
		/**
		 * Post type.
		 *
		 * @var \WP_Post_Type[] $post_types
		 */
		$post_types = get_post_types(
			array(
				'public'  => true,
				'show_ui' => true,
			),
			'objects'
		);

		$data = array();

		foreach ( $post_types as $post_type ) {
			$posts = get_posts(
				array(
					'post_status'    => array( 'publish', 'inherit' ),
					'order'          => 'DESC',
					'orderby'        => 'ID',
					'posts_per_page' => 1,
					'post_type'      => $post_type->name,
				)
			);

			if ( ! empty( $posts ) ) {
				$data[ $post_type->name ] = self::get_post_data( $posts[0] );
			}
		}

		$show_static_page = get_option( 'show_on_front' ) === 'page';
		$static_page      = get_post( (int) get_option( 'page_on_front' ) );
		if ( $show_static_page && $static_page ) {
			$data['static-home'] = self::get_post_data( get_post( (int) get_option( 'page_on_front' ) ) );
		}

		return $data;
	}

	/**
	 * Retrieves post data.
	 *
	 * @param \WP_Post $post Post data.
	 *
	 * @return array
	 */
	public static function get_post_data( $post ) {
		$post_data = $post->to_array();

		$terms          = wp_get_object_terms( $post->ID, get_post_taxonomies( $post ) );
		$taxonomy_terms = array();
		foreach ( $terms as $term ) {
			$taxonomy_terms[ $term->taxonomy ][] = $term->term_id;
		}

		$post_data['taxonomy_terms'] = $taxonomy_terms;
		$post_data['permalink']      = get_permalink( $post );

		return $post_data;
	}

	/**
	 * Retrieves random terms.
	 *
	 * @return array
	 */
	public static function get_random_terms() {
		$data       = array();
		$taxonomies = get_taxonomies( array(), 'objects' );
		foreach ( $taxonomies as $taxonomy ) {
			$terms = get_terms(
				array(
					'orderby'    => 'term_id',
					'order'      => 'DESC',
					'number'     => 1,
					'taxonomy'   => $taxonomy->name,
					'hide_empty' => false,
				)
			);

			if ( ! empty( $terms ) ) {
				$term                                 = array_shift( $terms );
				$data[ $taxonomy->name ]              = $term->to_array();
				$data[ $taxonomy->name ]['permalink'] = get_term_link( $term );
			}
		}

		return $data;
	}

	/**
	 * Retrieves random BuddyPress data.
	 *
	 * @return array
	 */
	public static function get_random_buddypress() {
		$buddypress_api = new \SmartCrawl\BuddyPress\Api();

		if ( ! $buddypress_api->buddypress() ) {
			return array();
		}

		$data               = array();
		$buddypress_profile = new Entities\BuddyPress_Profile( wp_get_current_user() );
		$data['bp_profile'] = array(
			'replacements' => $buddypress_profile->get_resolved_macros(),
			'url'          => $buddypress_profile->get_canonical_url(),
		);

		$groups = $buddypress_api->groups_get_groups( array( 'per_page' => 1 ) );
		if ( ! empty( $groups['groups'] ) ) {
			$buddypress_group = new Entities\BuddyPress_Group( $groups['groups'][0] );

			$data['bp_groups'] = array(
				'replacements' => $buddypress_group->get_resolved_macros(),
				'url'          => $buddypress_group->get_canonical_url(),
			);
		}

		return $data;
	}

	/**
	 * Retrieves random archives.
	 *
	 * @return array
	 */
	public static function get_random_archives() {
		$archives = array(
			'author' => self::get_author_archive_data(),
			'date'   => self::get_date_archive_data(),
			'search' => self::get_search_archive_data(),
			'404'    => self::get_404_archive_data(),
		);

		$post_types = get_post_types( array( 'public' => true ), 'objects' );
		foreach ( $post_types as $post_type ) {
			$archives[ 'pt-archive-' . $post_type->name ] = self::get_pt_archive_data( $post_type );
		}

		return $archives;
	}

	/**
	 * Retrieves author archive data.
	 *
	 * @return array
	 */
	private static function get_author_archive_data() {
		$author = new Entities\Post_Author( wp_get_current_user() );

		return array(
			'replacements' => $author->get_resolved_macros(),
			'url'          => $author->get_canonical_url(),
		);
	}

	/**
	 * Retrieves 404 archive data.
	 *
	 * @return array
	 */
	private static function get_404_archive_data() {
		return array(
			'replacements' => array(),
			'url'          => home_url( '/some-page-that-does-not-exist' ),
		);
	}

	/**
	 * Retrieves search archive data.
	 *
	 * @return array
	 */
	private static function get_search_archive_data() {
		$search_query = esc_html__( 'Example search query', 'wds' );
		$search       = new Entities\Search_Page( $search_query );

		return array(
			'replacements' => $search->get_resolved_macros(),
			'url'          => get_search_link( $search_query ),
		);
	}

	/**
	 * Retrieves date archive data.
	 *
	 * @return array
	 */
	private static function get_date_archive_data() {
		$month = date( 'n' ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
		$year  = date( 'Y' ); // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
		$date  = new Entities\Date_Archive( $year, $month );

		return array(
			'replacements' => $date->get_resolved_macros(),
			'url'          => $date->get_canonical_url(),
		);
	}

	/**
	 * Retrieves post type archive data.
	 *
	 * @param \WP_Post_Type $post_type_object Post type.
	 *
	 * @return array
	 */
	private static function get_pt_archive_data( $post_type_object ) {
		$post_type = new Entities\Post_Type( $post_type_object );

		return array(
			'replacements' => $post_type->get_resolved_macros(),
			'url'          => $post_type->get_canonical_url(),
		);
	}

	/**
	 * Deactivate meta module.
	 *
	 * @since 3.7.0
	 *
	 * @return void
	 */
	public function deactivate_onpage_module() {
		$data = $this->get_request_data();

		if ( empty( $data ) ) {
			wp_send_json_error();
		}

		Settings::deactivate_component( Settings::COMP_ONPAGE );

		wp_send_json_success();
	}
}