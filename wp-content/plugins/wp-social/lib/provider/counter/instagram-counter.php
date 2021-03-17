<?php

namespace WP_Social\Lib\Provider\Counter;

class Instagram_Counter implements Counter_Interface {

	public function need_to_call_legacy_function() {

		return false;
	}


	public static function get_transient_key() {

		return '_xs_social_instagram_count_';
	}


	public static function get_transient_timeout_key() {

		return 'timeout_' . self::get_transient_key();
	}


	public static function get_last_cache_key() {

		return '_xs_social_instagram_last_cached';
	}


	public function set_config_data($conf_array) {

		return $this;
	}


	public function get_count($global_cache_time = 43200) {

		/**
		 * This counter will be fired from front-end, so we are just sending the cached value
		 *
		 * Later we will first check cache, then fetch and then return
		 *
		 */


		$tran_key = self::get_transient_key();

		$trans_value = get_transient($tran_key);

		if(false === $trans_value) {

			/**
			 * Either key is not exists or value is expired!
			 *
			 */

			return get_option(self::get_last_cache_key(), 0);
		}


		return $trans_value['followed_by'];
	}
}