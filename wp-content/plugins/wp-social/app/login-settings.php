<?php

namespace WP_Social\App;

use WP_Social\Traits\Singleton;

defined('ABSPATH') || exit;

class Login_Settings {

	use Singleton;

	const OK_GLOBAL             = 'xs_global_setting_data';
	const OK_STYLES             = 'xs_style_setting_data';
	const OK_PROVIDER           = 'xs_provider_data';
	const OK_PROVIDER_ENABLED   = 'xs_providers_enabled_login';


	private $global;
	private $providers;
	private $enabled;
	private $styles;

	public function __construct() {

		$this->global    = get_option(self::OK_GLOBAL, []);
		$this->enabled   = get_option(self::OK_PROVIDER_ENABLED, []);
		$this->providers = get_option(self::OK_PROVIDER, []);
		$this->styles    = get_option(self::OK_STYLES, []);
	}


	public static function get_login_styles() {

		$styleArr = [
			'style1' => 'Style 1',
			'style2' => 'Style 2',
			'style3' => 'Style 3'
		];


		return $styleArr;
	}


	public function load() {

		if(empty($this->global)) {
			$this->global = get_option(self::OK_GLOBAL, []);
		}

		if(empty($this->enabled)) {
			$this->enabled = get_option(self::OK_PROVIDER_ENABLED, []);
		}

		if(empty($this->providers)) {
			$this->providers = get_option(self::OK_PROVIDER, []);
		}

		if(empty($this->styles)) {
			$this->styles = get_option(self::OK_STYLES, []);
		}

		return $this;
	}


	public function get_enabled_providers() {

		return $this->enabled;
	}


	public function update_enabled_providers($val) {

		$this->enabled = $val;

		update_option(self::OK_PROVIDER_ENABLED, $val, true);

		return $this;
	}


	public function get_provider_settings() {

		return $this->providers;
	}


	public function update_provider_settings($val) {

		$this->providers = $val;

		update_option(self::OK_PROVIDER, $val, true);

		return $this;
	}


	public function get_style_settings() {

		return $this->styles;
	}


	public function update_style_settings($val) {

		$this->styles = $val;

		update_option(self::OK_STYLES, $val, true);

		return $this;
	}


	public function get_global_settings() {

		return $this->global;
	}


	public function update_global_settings($val) {

		$this->global = $val;

		update_option(self::OK_GLOBAL, $val, true);

		return $this;
	}


	public function is_custom_url_enabled() {

		return !empty($this->global['custom_login_url']['enable']);
	}


	public function get_custom_url() {

		return empty($this->global['custom_login_url']['data']) ? '#' : $this->global['custom_login_url']['data'];
	}


	public function is_login_page_login_button_enabled() {

		return !empty($this->global['wp_login_page']['enable']);
	}


	public function get_selected_style() {

		return empty($this->styles['login_button_style']) ? 'style1' : $this->styles['login_button_style'];
	}
}
