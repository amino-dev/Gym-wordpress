<?php

if (!defined('ABSPATH')) die('Forbidden');

/**
 * These are mostly for other plugin, like woocommerce share product widget
 *
 */

if(!function_exists('__wp_social_share')) {

	function __wp_social_share($provider = 'all', $atts = []) {
		if(class_exists('\WP_Social\Inc\Share')) {
			$return = new \WP_Social\Inc\Share(false);

			return $return->get_share_data($provider, $atts);
		}
	}
}

if(!function_exists('__wp_social_share_pro_check')) {
	function __wp_social_share_pro_check() {
		$option_key     = 'xs_share_providers_data';
		$xsc_options    = get_option($option_key) ? get_option($option_key) : [];
		$share_provider = isset($xsc_options['social']) ? $xsc_options['social'] : [];

		foreach($share_provider AS $kk => $vv):
			if(isset($share_provider[$kk]['enable'])) {
				return true;
			}
		endforeach;

		return false;
	}
}

