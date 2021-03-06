<?php

namespace WP_Social\App;

use WP_Social\Traits\Singleton;

defined('ABSPATH') || exit;

class Share_Settings {

	use Singleton;

	const OK_GLOBAL             = 'xs_share_global_setting_data';
	const OK_STYLES             = 'xs_style_setting_data_share';
	const OK_PROVIDER           = 'xs_share_providers_data';
	const OK_PROVIDER_ENABLED   = 'xs_providers_enabled_share';


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


	public function is_theme_font_enabled() {

		return !empty($this->global['show_font_from_theme']);
	}


	public function is_share_content_enabled() {

		return empty($this->styles['login_content']) ? false : ($this->styles['login_content'] != 'no_content');
	}


	public function get_share_content_position() {

		return empty($this->styles['login_content']) ? 'after_content' : ($this->styles['login_content']);
	}
}
