<?php 
/**
 * Theme functions
 * 
 * @package Finanza
 * 
**/

if( !defined('FINANZA_DIR_PATH')){
    define( 'FINANZA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if( !defined('FINANZA_DIR_URI')){
    define( 'FINANZA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once FINANZA_DIR_PATH . '/inc/helpers/autoloader.php';


function finanza_get_theme_instance(){
    \FINANZA_THEME\Inc\FINANZA_THEME::get_instance();
}

finanza_get_theme_instance();


if ( ! function_exists( 'finanza_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress  
 * features.
 *
 * It is important to set up these functions before the init hook so
 * that none of these features are lost.
 *
 *  @since finanza 1.0
 */
function finanza_setup() {

    // Add a new customization section under "Site Identity"
    function finanza_general_settings($wp_customize) {
        $wp_customize->add_section('finanza_general_settings_section', array(
            'title' => 'Theme Options', // The title of the new section
            'priority' => 30, // Adjust the priority to set the order of appearance in the Customizer
        ));

        $wp_customize->add_setting('custom_phone_number', array(
            'default' => '',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control('custom_phone_number', array(
            'type' => 'text',
            'section' => 'finanza_general_settings_section',
            'label' => 'Phone Number',
        ));

        // Email Address
        $wp_customize->add_setting('custom_email_address', array(
            'default' => '',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control('custom_email_address', array(
            'type' => 'email',
            'section' => 'finanza_general_settings_section',
            'label' => 'Email Address',
        ));

        // Location
        $wp_customize->add_setting('custom_location', array(
            'default' => '',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control('custom_location', array(
            'type' => 'textarea',
            'section' => 'finanza_general_settings_section',
            'label' => 'Location',
        ));

        //Date Time
        $wp_customize->add_setting('start_time', array(
            'default' => '',
            'transport' => 'postMessage',
        ));
    
        class WP_Customize_Time_Control extends WP_Customize_Control {
            public $type = 'time';
        
            public function render_content() {
                ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                    <input type="time" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>" />
                </label>
                <?php
            }
        }
    
        $wp_customize->add_control(new WP_Customize_Time_Control($wp_customize, 'start_time', array(
            'section' => 'finanza_general_settings_section',
            'label' => 'Start Time',
        )));
        $wp_customize->add_setting('end_time', array(
            'default' => '',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new WP_Customize_Time_Control($wp_customize, 'end_time', array(
            'section' => 'finanza_general_settings_section',
            'label' => 'End Time',
        )));
       
    }
    add_action('customize_register', 'finanza_general_settings');

}

endif; // finanza_setup
add_action( 'after_setup_theme', 'finanza_setup' );