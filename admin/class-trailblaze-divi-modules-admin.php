<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://trailblazecreative.com/
 * @since      1.0.0
 *
 * @package    Trailblaze_Divi_Modules
 * @subpackage Trailblaze_Divi_Modules/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Trailblaze_Divi_Modules
 * @subpackage Trailblaze_Divi_Modules/admin
 * @author     TrailBlaze Creative <websupport@trailblazecreative.com>
 */
class Trailblaze_Divi_Modules_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/trailblaze-divi-modules-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trailblaze-divi-modules-admin.js', array( 'jquery' ), $this->version, false );

	}

    //add_custom_fields_to_people_module
    public function add_custom_fields_to_team_member_module($fields_unprocessed) {

        $fields =[];
        $fields['email'] = [
            'label'           => esc_html__( 'Email Address', 'et_builder' ),
            'type'            => 'text',
            'option_category' => 'basic_option',
            'description'     => esc_html__( 'Input Email Address.', 'et_builder' ),
            'toggle_slug'     => 'main_content',
            'dynamic_content' => 'url',
        ];
        //insert before $fields_unprocessed['facebook_url']
        // Define the index where you want to insert new fields
        $insert_index = 3;

// Check if the insert index is greater than the length of the array
        if ($insert_index > count($fields_unprocessed)) {
            // If so, append at the end
            $insert_index = count($fields_unprocessed);
        }

// Merge the arrays
        return array_merge(
            array_slice($fields_unprocessed, 0, $insert_index),
            $fields,
            array_slice($fields_unprocessed, $insert_index)
        );
    }

    // render_team_member_module
    public function render_team_member_module($output, $render_slug, $module) {
        if('et_pb_team_member' !== $render_slug) return $output;
        if ( is_array( $output ) ) {
            error_log( print_r( $output, true ) );
            return $output;
        }
        $email = $module->props['email'];

        if ( '' !== $email ) {
            $email_link = sprintf(
                '<li><a href="mailto:%1$s" class="et_pb_font_icon et_pb_email_icon"><i class="email_icon icon_email"></i><span>%2$s</span></a></li>',
                esc_attr( $email ),
                esc_html__( 'Email', 'et_builder' )
            );
            $pattern = '/(<ul class="et_pb_member_social_links">)/';
            $replacement = '$1' . $email_link;
            $output = preg_replace($pattern, $replacement, $output);
        }

        return $output;
    }


}
