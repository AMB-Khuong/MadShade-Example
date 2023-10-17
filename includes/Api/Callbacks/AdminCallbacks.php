<?php
/**
 * @package Amoeba
 */
namespace Amoeba\Inc\Api\Callbacks;

use Amoeba\Inc\Controller\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->theme_path/includes/View/dashboard.php" );
	}
}
