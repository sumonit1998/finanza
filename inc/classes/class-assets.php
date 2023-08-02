<?php 
/**
 * Finanza theme asstes
 * 
 * @package Finanza
 * 
 **/

namespace FINANZA_THEME\Inc;
use FINANZA_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

        // load class
        $this->setup_hooks();
    }
    protected function setup_hooks() {
        /**
         * Actions.
         * 
         **/
        add_action('wp_enqueue_scripts', [ $this, 'register_style']);
        add_action('wp_enqueue_scripts', [ $this, 'register_script']);
    }
    // Register style
    public function register_style() {
        wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap',[], false, 'all');
        wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css',[], false, 'all');
        wp_register_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css',[], false, 'all');
        wp_register_style('main-css', get_stylesheet_uri(), [], filemtime( FINANZA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('animate-css', FINANZA_DIR_URI . '/assets/lib/animate/animate.min.css',[], false, 'all');
        wp_register_style('owlcarousel-css', FINANZA_DIR_URI . '/assets/lib/owlcarousel/assets/owl.carousel.min.css',[], false, 'all');
        wp_register_style('bootstrap-css', FINANZA_DIR_URI . '/assets/css/bootstrap.min.css',[], false, 'all');
        wp_register_style('custom-css', FINANZA_DIR_URI . '/assets/css/style.css',[], false, 'all');

        // enqueue style
        wp_enqueue_style('google-fonts');
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('bootstrap-icons');
        wp_enqueue_style('main-css');
        wp_enqueue_style('animate-css');
        wp_enqueue_style('owlcarousel-css');
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('custom-css');

    }
    // Register scripts
    public function register_script()
    {
        wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', ['jquery'], false, true);
        wp_register_script('wow', FINANZA_DIR_URI . '/assets/lib/wow/wow.min.js', [], filemtime( FINANZA_DIR_PATH . '/assets/lib/wow/wow.min.js'), true);
        wp_register_script('easing', FINANZA_DIR_URI . '/assets/lib/easing/easing.min.js', [], filemtime( FINANZA_DIR_PATH . '/assets/lib/easing/easing.min.js'), true);
        wp_register_script('waypoints', FINANZA_DIR_URI . '/assets/lib/waypoints/waypoints.min.js', [], filemtime( FINANZA_DIR_PATH . '/assets/lib/waypoints/waypoints.min.js'), true);
        wp_register_script('owlcarousel', FINANZA_DIR_URI . '/assets/lib/owlcarousel/owl.carousel.min.js', [], filemtime( FINANZA_DIR_PATH . '/assets/lib/owlcarousel/owl.carousel.min.js'), true);
        wp_register_script('counterup', FINANZA_DIR_URI . '/assets/lib/counterup/counterup.min.js', [], filemtime( FINANZA_DIR_PATH . '/assets/lib/counterup/counterup.min.js'), true);
        wp_register_script('main', FINANZA_DIR_URI . '/assets/js/main.js', [], filemtime( FINANZA_DIR_PATH . '/assets/js/main.js'), true); 

        // enqueue scripts
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap');
        wp_enqueue_script('wow');
        wp_enqueue_script('easing');
        wp_enqueue_script('waypoints');
        wp_enqueue_script('owlcarousel');
        wp_enqueue_script('counterup');
        wp_enqueue_script('main');
    }
}