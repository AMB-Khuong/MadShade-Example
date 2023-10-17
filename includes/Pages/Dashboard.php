<?php
/**
 * @package Amoeba
 */
namespace Amoeba\Inc\Pages;

use Amoeba\Inc\Api\SettingsApi;
use Amoeba\Inc\Controller\BaseController;
use Amoeba\Inc\Api\Callbacks\AdminCallbacks;
use Amoeba\Inc\Api\Callbacks\ManagerCallbacks;
class Dashboard extends BaseController
{
	public $settings;

	public $subpages;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();
	}
}
