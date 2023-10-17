<?php

/**
 * @package Amoeba
 */

namespace Amoeba\Inc\Base;

use Amoeba\Inc\Controller\BaseController;

/**
 *
 */
class Enqueue extends BaseController
{

	public function register()
	{

		add_action('after_setup_theme', array($this, 'madshade_config'), 0);
		add_action('wp_enqueue_scripts', array($this, 'madshade_scripts'), 11);
	}





	public function madshade_scripts()
	{

	
		//bootstrap
		wp_enqueue_script('bootstrap-js', URL_THEME . '/assets/js/bootstrap/bootstrap.min.js', array('jquery'), '5.3.0', true);
		wp_enqueue_style('bootstrap-css', URL_THEME . '/assets/css/bootstrap/bootstrap.min.css', array(), '5.3.0', 'all');
		//slick slider
		wp_enqueue_script('slick-js', URL_THEME . '/assets/js/slick/slick.min.js', array('jquery'), '1.8.1', true);
		wp_enqueue_style('slick-css', URL_THEME . '/assets/css/slick/slick.css', array(), '1.8.1', 'all');
		wp_enqueue_style('slick-theme-css', URL_THEME . '/assets/css/slick/slick-theme.css', array(), '1.8.1', 'all');
		//swiper 
		wp_enqueue_script('swiper-js', URL_THEME . '/assets/js/swiper/swiper-bundle.min.js', array('jquery'), true);
		wp_enqueue_style('swiper-css', URL_THEME . '/assets/css/swiper/swiper-bundle.min.css', array(), 'all');

		//owl carousel
		wp_enqueue_script('owl-carousel-js', URL_THEME . '/assets/js/owl-carousel/owl.carousel.min.js', array('jquery'), '2.3.4', true);
		wp_enqueue_style('owl-carousel-css', URL_THEME . '/assets/css/owl-carousel/owl.carousel.min.css', array(), '2.3.4', 'all');
		wp_enqueue_style('owl-carousel-theme-css', URL_THEME . '/assets/css/owl-carousel/owl.theme.default.min.css', array(), '2.3.4', 'all');
		// wp_enqueue_style( 'madshade-reset-css', URL_THEME . '/assets/css/reset.css', array(), '', 'all' );
		//style
		wp_enqueue_style('madshade-css', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
		wp_enqueue_style('madshade-header-css', URL_THEME . '/assets/css/header.css', array(), '', 'all');
		wp_enqueue_style('madshade-footer-css', URL_THEME . '/assets/css/footer.css', array(), '', 'all');
		wp_enqueue_style('madshade-terms-css', URL_THEME . '/assets/css/terms.css', array(), '', 'all');
		wp_enqueue_style('madshade-privacy-css', URL_THEME . '/assets/css/privacy.css', array(), '', 'all');
		wp_enqueue_style('madshade-contact-css', URL_THEME . '/assets/css/contact.css', array(), '', 'all');
		wp_enqueue_style('madshade-main-css', URL_THEME . '/assets/css/main.css', array(), '', 'all');


		//scripts
		wp_enqueue_script('main-js', URL_THEME . '/assets/js/main.js', array('jquery'), '', true);

		if (is_product_category() || is_search() || is_shop()) {

			wp_enqueue_style('category-css', URL_THEME . '/assets/css/category.css', array(), '', 'all');
			wp_enqueue_script('category-js', URL_THEME . '/assets/js/category.js', array('jquery'), '', true);
		}


		if (is_product()) {

			//style
			wp_enqueue_style('product-detail-css', URL_THEME . '/assets/css/product-detail.css', array(), '', 'all');
			wp_enqueue_script('product-detail-js', URL_THEME . '/assets/js/product-detail.js', array('jquery'), '', true);
		}
	}

	public function madshade_config()
	{
		//custom logo resize
		add_theme_support('custom-logo', array(
			'width' => 220,
			'height' => 33,
		));

		register_nav_menus(
			array(
				'main_menu' => 'Main Menu',
				'left_menu' => 'Left Menu'
			)
		);
	}
}