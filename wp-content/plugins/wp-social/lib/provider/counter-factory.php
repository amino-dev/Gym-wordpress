<?php

namespace WP_Social\Lib\Provider;

use WP_Social\Lib\Provider\Counter\Comments_Counter;
use WP_Social\Lib\Provider\Counter\Dribbble_Counter;
use WP_Social\Lib\Provider\Counter\Instagram_Counter;
use WP_Social\Lib\Provider\Counter\No_Provider_Counter;
use WP_Social\Lib\Provider\Counter\Pinterest_Counter;
use WP_Social\Lib\Provider\Counter\Posts_Counter;
use WP_Social\Lib\Provider\Counter\Youtube_Counter;
use WP_Social\Lib\Provider\Counter\Twitter_Counter;


class Counter_Factory {

	private $provider_type;

	public $factory;


	public function __construct() {}


	public function make($type) {

		$this->provider_type = $type;

		switch($type) {

			case 'instagram' :
				$this->factory = new Instagram_Counter();
				break;

//			case 'facebook' :
//				$this->factory = new Facebook_Counter();
//				break;
//
			case 'twitter' :
				$this->factory = new Twitter_Counter();
				break;

			case 'pinterest' :
				$this->factory = new Pinterest_Counter();
				break;

			case 'dribbble' :
				$this->factory = new Dribbble_Counter();
				break;

			case 'youtube' :
				$this->factory = new Youtube_Counter();
				break;

//			case 'mailchimp' :
//				$this->factory = new Mailchimp_Counter();
//				break;
//
			case 'comments' :
				$this->factory = new Comments_Counter();
				break;

			case 'posts' :
				$this->factory = new Posts_Counter();
				break;

			default:
				$this->factory = new No_Provider_Counter();

		}

		return $this->factory;
	}
}