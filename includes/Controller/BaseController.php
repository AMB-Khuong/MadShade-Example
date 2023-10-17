<?php
/**
 * @package Amoeba
 */
namespace Amoeba\Inc\Controller;

class BaseController
{
    public $user_role_default = 'customer';

	public $theme_path;

	public $theme_url;

	public $plugin;

	public $managers = array();

	public $input_groupproduct = array(
        'what_new' => 'What\'s New',
        'chosen_for_you' => 'Chosen For You',
        'brand_section' => 'Brand Section',
    );

	public function __construct() {
		$this->theme_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->theme_url = plugin_dir_url( dirname( __FILE__, 2 ) );
	}
}