<?php
/**
  Plugin Name: Lightning Fast Social Media Buttons
  Plugin URI: http://xfive.co
  Description: Setup your social media buttons lightning fast.
  Author: Xfive
  Version: 1.0
  Author URI: http://xfive.co
  License: GPLv2 or later
  Copyright: Xfive.co
 */

/**
 * Wrapper for the LFSMB::manual_embed();
 */
function lfbtn_embed() {
	$lfbtn->manual_embed();
}

class Lightning_Fast_Buttons {

	/**
	 * Instance variable to store plugin's object
	 * 
	 * @var self::object 
	 */
	public static $instance = null;

	/**
	 * Store the social media settings
	 * 
	 * @var array
	 */
	public $social_media = array();

	/**
	 *  Private constructor to follow the Singleton pattern
	 */
	public function __construct() {

		// configure the social media variables
		$this->social_media = array(
			'lightning_fast_buttons_tw' => array(
				'name' => __( 'Twitter', 'lightning_fast_buttons' ),
				'has_counter' => false,
				'share_url' => 'https://twitter.com/share?url=',
				'svg_box' => '0 0 100 81.22',
				'svg_path' => 'M89.72,29.63c0.06,0.89.06,1.78,0.06,2.67,0,27.09-20.62,58.31-58.31,58.31A57.92,57.92,0,0,1,0,81.41a42.52,42.52,0,0,0,4.95.25,41,41,0,0,0,25.44-8.76A20.53,20.53,0,0,1,11.23,58.69,25.77,25.77,0,0,0,15.1,59a21.7,21.7,0,0,0,5.39-.7A20.5,20.5,0,0,1,4.06,38.2V37.94a20.66,20.66,0,0,0,9.26,2.6A20.53,20.53,0,0,1,7,13.13,58.26,58.26,0,0,0,49.24,34.58a23.19,23.19,0,0,1-.51-4.69,20.51,20.51,0,0,1,35.47-14,40.35,40.35,0,0,0,13-4.95,20.43,20.43,0,0,1-9,11.29A41.05,41.05,0,0,0,100,19,44,44,0,0,1,89.72,29.63Z',
				'svg_transform' => 'translate(0 -9.39)',
			),
			'lightning_fast_buttons_fb' => array(
				'name' => __( 'Facebook', 'lightning_fast_buttons' ),
				'has_counter' => true, 'share_url' =>
				'http://www.facebook.com/sharer/sharer.php?u=',
				'svg_box' => '0 0 51.92 100',
				'svg_path' => 'M76,16.59H66.53c-7.39,0-8.77,3.55-8.77,8.65V36.6H75.36L73,54.39H57.75V100H39.36V54.39H24V36.6H39.36V23.5C39.36,8.29,48.68,0,62.26,0A117.7,117.7,0,0,1,76,.72V16.59Z',
				'svg_transform' => 'translate(-24.04)',
			),
			'lightning_fast_buttons_ln' => array(
				'name' => __(
				'Linkedin', 'lightning_fast_buttons' ),
				'has_counter' => true,
				'share_url' => 'https://www.linkedin.com/shareArticle?mini=true&amp;url=',
				'svg_box' => '0 0 100 95.57',
				'svg_path' => 'M12,22.26H11.85C4.62,22.26,0,17.32,0,11.13S4.82,0,12.11,0,24,4.82,24.09,11.13,19.47,22.26,12,22.26ZM22.72,95.57H1.24V31.05H22.72V95.57Zm77.28,0H78.58V61.07c0-8.66-3.12-14.58-10.87-14.58-5.92,0-9.44,4-11,7.81A16.17,16.17,0,0,0,56,59.57v36H34.57c0.26-58.46,0-64.52,0-64.52H56v9.38H55.86c2.8-4.43,7.88-10.87,19.47-10.87,14.13,0,24.67,9.25,24.67,29v37Z',
				'svg_transform' => '',
			),
			'lightning_fast_buttons_gp' => array(
				'name' => __( 'Google', 'lightning_fast_buttons' ),
				'has_counter' => true,
				'share_url' => 'https://plus.google.com/share?url=',
				'svg_box' => '0 0 97.98 100',
				'svg_path' => 'M98.21,42.84A44.3,44.3,0,0,1,99,51.17C99,79.69,79.85,100,51,100A50,50,0,0,1,51,0,48.09,48.09,0,0,1,84.54,13.09L70.93,26.17A28.11,28.11,0,0,0,51,18.42C34,18.42,20,32.55,20,50S34,81.57,51,81.57C70.8,81.57,78.22,67.38,79.39,60H51V42.84h47.2Z',
				'svg_transform' => 'translate(-1.01)',
			),
			'lightning_fast_buttons_rd' => array(
				'name' => __( 'Reddit', 'lightning_fast_buttons' ),
				'has_counter' => false,
				'share_url' => 'http://reddit.com/submit?url=',
				'svg_box' => '0 0 100 94.42',
				'svg_path' => 'M93.91,59.93a21.29,21.29,0,0,1,.68,5.35c0,17.64-19.92,31.92-44.48,31.92S5.69,82.92,5.69,65.29A23.29,23.29,0,0,1,6.3,60,11.12,11.12,0,1,1,19.2,42.41c7.53-5.24,17.57-8.65,28.73-9L54.41,4.3A2,2,0,0,1,56.7,2.85L77.29,7.37a8.35,8.35,0,1,1-.89,3.8L57.75,7,52,33.37c11.22,0.33,21.37,3.68,29,8.93a11,11,0,0,1,8-3.4A11.12,11.12,0,0,1,93.91,59.93ZM31.64,69.48a8.34,8.34,0,1,0-8.31-8.37A8.35,8.35,0,0,0,31.64,69.48ZM68.52,78a2,2,0,0,0-2.85,0C62.33,81.42,55.13,82.59,50,82.59S37.67,81.42,34.32,78a2,2,0,0,0-2.85,0,2,2,0,0,0,0,2.9C36.77,86.22,47,86.61,50,86.61s13.23-.39,18.52-5.69A2,2,0,0,0,68.52,78ZM76.68,61.1a8.34,8.34,0,1,0-8.31,8.37A8.34,8.34,0,0,0,76.68,61.1Z',
				'svg_transform' => 'translate(0 -2.79)',
			),
			'lightning_fast_buttons_tu' => array(
				'name' => __( 'Tumblr', 'lightning_fast_buttons' ),
				'has_counter' => false,
				'share_url' => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=',
				'svg_box' => '0 0 57.45 100',
				'svg_path' => 'M78.73,94.11c-1.8,2.7-10,5.76-17.31,5.89-21.81.36-30-15.51-30-26.68V40.62H21.27V27.7C36.42,22.23,40.08,8.53,40.92.72A0.82,0.82,0,0,1,41.65,0H56.31V25.48h20V40.62H56.26V71.75c0,4.21,1.56,10,9.61,9.86a23,23,0,0,0,8.05-1.74Z',
				'svg_transform' => 'translate(-21.27 0)',
			),
			'lightning_fast_buttons_su' => array(
				'name' => __( 'StumbleUpon', 'lightning_fast_buttons' ),
				'has_counter' => true,
				'share_url' => 'https://twitter.com/share?url=',
				'svg_box' => '0 0 100 76.36',
				'svg_path' => 'M55.32,34.27a5.32,5.32,0,0,0-10.63,0V66.14A22.34,22.34,0,0,1,0,65.83V52H17.08V65.63a5.31,5.31,0,1,0,10.62,0V33.33C27.71,21.4,37.92,11.82,50,11.82s22.29,9.64,22.29,21.67v7.08l-10.16,3-6.82-3.18V34.27ZM100,52V65.83A22.34,22.34,0,0,1,55.32,66v-14l6.82,3.18,10.16-3V66.3a5.31,5.31,0,0,0,10.62,0V52H100Z',
				'svg_transform' => 'translate(0 -11.82)',
			),
			'lightning_fast_buttons_pt' => array(
				'name' => __( 'Pinterest', 'lightning_fast_buttons' ),
				'has_counter' => true,
				'share_url' => 'https://pinterest.com/pin/create/bookmarklet/?url=',
				'svg_box' => '0 0 76.92 100',
				'svg_path' => 'M52.4,0C71.27,0,88.46,13,88.46,32.87c0,18.69-9.56,39.43-30.83,39.43-5,0-11.42-2.52-13.88-7.21-4.57,18.1-4.21,20.79-14.31,34.62l-0.84.3-0.54-.6c-0.36-3.78-.9-7.51-0.9-11.29,0-12.27,5.65-30,8.42-41.89a23.48,23.48,0,0,1-1.93-10.16c0-6.07,4.21-13.76,11.06-13.76,5.06,0,7.75,3.85,7.75,8.59,0,7.81-5.28,15.15-5.28,22.72,0,5.17,4.27,8.77,9.25,8.77,13.83,0,18.09-20,18.09-30.59,0-14.24-10.1-22-23.74-22-15.87,0-28.12,11.42-28.12,27.52,0,7.75,4.75,11.72,4.75,13.58,0,1.56-1.14,7.09-3.13,7.09a5.9,5.9,0,0,1-1-.18c-8.59-2.58-11.72-14.06-11.72-21.93C11.54,13.7,31.85,0,52.4,0Z',
				'svg_transform' => 'translate(-11.54)',
			),
		);

		// load the plugins scripts and styles
		add_action( 'wp_enqueue_scripts', array( $this, 'front_enqueue_scripts' ), 99999 );
		add_filter( 'script_loader_tag', array( $this, 'add_async_attribute' ), 10, 2 );

		// embed actions
		add_shortcode( 'lfbtn', array( $this, 'shortcode_handler' ) );
		add_filter( 'the_content', array( $this, 'maybe_embed_top' ), 99999 );
		add_filter( 'the_content', array( $this, 'maybe_embed_bot' ), 99999 );

		// admin UI actions
		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
		add_action( 'admin_footer', array( $this, 'admin_inline_styles' ) );

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );

		// Load plugin text domain
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
	}

	/**
	 * @hook admin_enqueue_scripts
	 */
	public function admin_enqueue_scripts() {
		
	}

	/**
	 * @hook wp_enqueue_scripts
	 */
	public function front_enqueue_scripts() {
		wp_register_style( 'lightning_fast_buttons-css', plugins_url( 'css/lfb-default.min.css', __FILE__ ) );
		wp_enqueue_style( 'lightning_fast_buttons-css' );

		wp_register_script( 'lightning_fast_buttons-js', plugins_url( 'js/lfb.min.js', __FILE__ ) );

		// Localize the script with new data
		$translation_array = array(
			'api_key' => get_option( 'lightning_fast_buttons_api_key' ),
		);

		wp_localize_script( 'lightning_fast_buttons-js', 'lightning_fast_buttons_settings', $translation_array );

		wp_enqueue_script( 'lightning_fast_buttons-js' );
	}

	/**
	 * Print admin inline
	 * 
	 * @hook admin_footer
	 */
	public function admin_inline_styles() {
		?>
		<style>
			.lightning_fast_buttons_form input[type=text], 
			.lightning_fast_buttons_form textarea,
			.lightning_fast_buttons_form select {
				min-width:300px;

			}
			.lightning_fast_buttons_form textarea {
				resize: both;
			}

		</style>
		<?php
	}

	/**
	 * Make sure the scripts have async attribute added
	 * 
	 * @hook script_loader_tag
	 */
	public function add_async_attribute($tag, $handle) {
		if ( 'lightning_fast_buttons-js' !== $handle )
			return $tag;
		return str_replace( ' src', ' async="async" src', $tag );
	}

	/**
	 * @hook init
	 */
	public function load_plugin_textdomain() {
		$domain = 'lightning_fast_buttons';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/lang/' );
	}

	/**
	 * Handle the shortcode functionality
	 * 
	 * @hook add_shortcode - lightning_fast_buttons
	 */
	public function shortcode_handler($atts, $content = 'null') {
		require_once(__DIR__ . '/templates/shortcode.php');
	}

	/**
	 * @hook the_content
	 */
	public function maybe_embed_top($content) {

		// make sure this affects only single posts / pages / post types
		if ( is_singular() ) {
			// let's make sure this gets fired only when we want it to
			if ( get_option( 'lightning_fast_buttons_auto_embed' ) != 'top' ) {
				return $content;
			}
			ob_start();
			$this->manual_embed( $this->social_media );
			$embed = ob_get_clean();
			return $embed . $content;
		} else {
			return $content;
		}
	}

	/**
	 * @hook the_content
	 */
	public function maybe_embed_bot($content) {
		// make sure this affects only single posts / pages / post types
		if ( is_singular() ) {
			// let's make sure this gets fired only when we want it to
			if ( get_option( 'lightning_fast_buttons_auto_embed' ) != 'bottom' ) {
				return $content;
			}
			ob_start();
			$this->manual_embed( $this->social_media );
			$embed = ob_get_clean();
			return $content . $embed;
		} else {
			return $content;
		}
	}

	/**
	 * Add ACF Recent Posts Widget admin menu
	 * @hook admin_menu
	 */
	public function plugin_menu() {
		add_menu_page( 'Lightning-Fast Buttons', 'Lightning-Fast Buttons', 'read', 'lightning_fast_buttons-settings', array( $this, 'plugin_page' ) );
		add_action( 'admin_init', array( $this, 'register_plugin_settings' ) );
	}

	/**
	 * Add ACF Recent Posts Widget plugin page
	 * @hook ade_menu_page
	 */
	public function plugin_page() {
		?>
		<div class="wrap">
			<h2><?php _e( 'Lightning-Fast Buttons: Settings', 'lightning_fast_buttons' ); ?></h2>
			<hr />
			<form method="post" action="options.php" class="lightning_fast_buttons_form"> 
				<h3><?php _e( 'General Settings', 'lightning_fast_buttons' ); ?></h3>
				<hr />
				<?php settings_fields( 'lightning_fast_buttons-settings-group' ); ?>
				<?php do_settings_sections( 'lightning_fast_buttons-settings-group' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'Shared Count API Key', 'lightning_fast_buttons' ); ?></th>
						<td><input type="text" name="lightning_fast_buttons_api_key" value="<?php echo get_option( 'lightning_fast_buttons_api_key' ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'Auto Embed', 'lightning_fast_buttons' ); ?></th>
						<td>
							<select name="lightning_fast_buttons_auto_embed">
								<option value="-1" <?php selected( get_option( 'lightning_fast_buttons_auto_embed' ), '-1' ); ?>><?php _e( 'No auto embed', 'lightning_fast_buttons' ); ?></option>
								<option value="top" <?php selected( get_option( 'lightning_fast_buttons_auto_embed' ), 'top' ); ?>><?php _e( 'Top of posts and pages' ); ?></option>
								<option value="bottom" <?php selected( get_option( 'lightning_fast_buttons_auto_embed' ), 'bottom' ); ?>><?php _e( 'Bottom of posts and pages' ); ?></option>
							</select>
						</td>
					</tr>
				</table>
				<?php
				if ( !empty( $this->social_media ) ):
					foreach ( $this->social_media as $key => $social ):
						?>
						<h3><?php echo $social['name']; ?> <?php _e( 'Settings', 'lightning_fast_buttons' ); ?></h3>
						<hr />
						<table class="form-table">
							<tr valign="top">
								<th scope="row"><?php _e( 'Displayed', 'lightning_fast_buttons' ); ?></th>
								<td><input type="checkbox" name="<?php echo $key; ?>_display" value="1" <?php checked( get_option( $key . '_display' ), 1 ); ?> /></td>
							</tr>
							<?php if ( $social['has_counter'] ): ?>
								<tr valign="top">
									<th scope="row"><?php _e( 'Display Counter', 'lightning_fast_buttons' ); ?></th>
									<td><input type="checkbox" name="<?php echo $key; ?>_counter" value="1" <?php checked( get_option( $key . '_counter' ), 1 ); ?> /></td>
								</tr>
							<?php endif; ?>
							<tr valign="top">
								<th scope="row"><?php _e( 'SVG viewBox', 'lightning_fast_buttons' ); ?></th>
								<td><input type="text" name="<?php echo $key; ?>_vb" value="<?php echo get_option( $key . '_vb' ); ?>" /></td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e( 'SVG Path', 'lightning_fast_buttons' ); ?></th>
								<td>
									<textarea name="<?php echo $key; ?>_path"><?php echo get_option( $key . '_path' ); ?></textarea>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e( 'SVG Transform', 'lightning_fast_buttons' ); ?></th>
								<td><input type="text" name="<?php echo $key; ?>_transform" value="<?php echo get_option( $key . '_transform' ); ?>" /></td>
							</tr>
						</table>
					<?php endforeach; ?>
				<?php endif; ?>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
			</form>

		</div>
		<?php
	}

	/**
	 * Register plugin settings
	 * 
	 * @hook admin_init 
	 */
	public function register_plugin_settings() {
		// Generic Settings
		register_setting( 'lightning_fast_buttons-settings-group', 'lightning_fast_buttons_api_key' );
		register_setting( 'lightning_fast_buttons-settings-group', 'lightning_fast_buttons_auto_embed' );

		// register setting for each social media
		if ( !empty( $this->social_media ) ) {
			foreach ( $this->social_media as $key => $name ) {
				register_setting( 'lightning_fast_buttons-settings-group', $key . '_display' );
				register_setting( 'lightning_fast_buttons-settings-group', $key . '_counter' );
				register_setting( 'lightning_fast_buttons-settings-group', $key . '_vb' );
				register_setting( 'lightning_fast_buttons-settings-group', $key . '_path' );
				register_setting( 'lightning_fast_buttons-settings-group', $key . '_transform' );
			}
		}
	}

	/**
	 * Hook to the plugin action links
	 * 
	 * @hook plugin_action_links_
	 * @param array $links
	 */
	public function action_links($links) {
		array_unshift( $links, '<a href="' . esc_url( get_admin_url( null, 'options-general.php?page=lightning_fast_buttons-settings' ) ) . '">' . __( 'Settings', 'lightning_fast_buttons' ) . '</a>' );
		return $links;
	}

	/**
	 * Utility to manually embed social media buttons
	 */
	public function manual_embed($social_media) {
		require_once(__DIR__ . '/templates/manual.php');
	}

}

// instantiate the plugin
global $lfbtn;
$lfbtn = new Lightning_Fast_Buttons();

