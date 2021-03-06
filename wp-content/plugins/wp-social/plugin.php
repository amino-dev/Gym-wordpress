<?php

namespace WP_Social;

defined('ABSPATH') || exit;

class Plugin {

    private static $instance;


	public static function instance() {
		if(!self::$instance) {
			self::$instance = new static();
		}

		return self::$instance;
    }
    
    public function __construct() {
        
    }

    public function enqueue() {
        
        add_action( 'admin_enqueue_scripts', [$this, 'load_admin_scripts'] );

        add_action( 'wp_enqueue_scripts', [$this, 'load_public_scripts'] );        
    }


    public function load_admin_scripts() {

        wp_register_script( 'xs_login_custom_js1', WSLU_LOGIN_PLUGIN_URL. 'assets/js/admin-login-custom.js', array('jquery'));
        wp_register_script( 'xs_login_custom_js2', WSLU_LOGIN_PLUGIN_URL. 'assets/js/admin-main.js', array('jquery', 'jquery-ui-sortable'));
        
        wp_localize_script('xs_login_custom_js1', 'rest_api_conf', array(
            'siteurl' => get_option('siteurl'),
            'nonce'   => wp_create_nonce('wp_rest'),
            'root' 	  => get_rest_url(),
        ));
    
        wp_enqueue_script( 'xs_login_custom_js1' );
        wp_enqueue_script( 'xs_login_custom_js2' );


        wp_register_style( 'xs_login_custom_css1', WSLU_LOGIN_PLUGIN_URL. 'assets/css/admin-login-custom.css');
        wp_register_style( 'xs_login_custom_css_icon', WSLU_LOGIN_PLUGIN_URL. 'assets/css/font-icon.css');
        wp_register_style( 'xs_login_custom_css2', WSLU_LOGIN_PLUGIN_URL. 'assets/css/admin-style.css');
        wp_register_style( 'xs_login_custom_css3', WSLU_LOGIN_PLUGIN_URL. 'assets/css/admin-responsive.css');
        wp_enqueue_style( 'xs_login_custom_css1' );
        wp_enqueue_style( 'xs_login_custom_css2' );
        wp_enqueue_style( 'xs_login_custom_css3' );
        wp_enqueue_style( 'xs_login_custom_css_icon' );
    }


    public function load_public_scripts() {

        wp_register_script( 'xs_social_custom', WSLU_LOGIN_PLUGIN_URL. 'assets/js/social-front.js', array('jquery'));

	    wp_localize_script('xs_social_custom', 'rest_api_conf', array(
		    'siteurl' => get_option('siteurl'),
		    'nonce'   => wp_create_nonce('wp_rest'),
		    'root' 	  => get_rest_url(),
	    ));

	    wp_enqueue_script( 'xs_social_custom' );

    }




}