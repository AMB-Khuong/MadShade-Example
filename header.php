<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amoeba
 */
?>
<?php global $current_user;
wp_get_current_user(); ?>

<?php global $wp_query;
    $max_pages = $wp_query->max_num_pages;?>

<?php
 $product_id = get_the_ID(); // Lấy ID của sản phẩm hiện tại
 $product = wc_get_product($product_id); // Lấy thông tin sản phẩm
$maxImageCount = 0;
if (is_product()) {
    $gallery_image_ids = $product->get_gallery_image_ids(); // Lấy danh sách ID hình ảnh trong gallery
    $galleryImageCount = count( $gallery_image_ids); // Đếm số lượng hình ảnh trong gallery
  
    // Giới hạn số lượng hình ảnh hiển thị
     $maxImageCount = ($galleryImageCount > 6) ? 6 : $galleryImageCount;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <script type="text/javascript">
    const MADSHADE_THEME_PATH = '<?= get_bloginfo("stylesheet_directory"); ?>';
    const MADSHADE_ADMIN_URL = '<?= admin_url() ?>';
    const MADSHADE_HOME_URL = '<?= home_url() ?>';
    const MAX_PAGE = <?= $max_pages ?>;
    const MADSHADE_LENGTH_GALLERY = <?= $maxImageCount ?>;
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-list">
                    <div class="header-top-item">
                        <a href="https://ivyusa.com/"><img src="<?php echo URL_THEME; ?>/assets/images/ivy-beauty.png"
                                alt="Ivy Beauty" loading="lazy"></a>
                    </div>
                    <div class="header-top-item">
                        <a href="https://redbeauty.com" target="_blank"><img
                                src="<?php echo URL_THEME; ?>/assets/images/red-kiss.png" alt="Red By Kiss"
                                loading="lazy"></a>
                    </div>
                    <div class="header-top-item">
                        <a href="https://ienvybykiss.com" target="_blank"><img
                                src="<?php echo URL_THEME; ?>/assets/images/envy-kiss.png" alt="IEnvy By Kiss"
                                loading="lazy"></a>
                    </div>
                    <div class="header-top-item">
                        <a href="https://rubykissescosmetics.com" target="_blank"><img
                                src="<?php echo URL_THEME; ?>/assets/images/ruby-kiss.png" alt="Ruby Kisses"
                                loading="lazy"></a>
                    </div>
                    <div class="header-top-item">
                        <a href="https://www.vluxelashes.com" target="_blank"><img
                                src="<?php echo URL_THEME; ?>/assets/images/luxe-envy.png" alt="Vluxe"
                                loading="lazy"></a>
                    </div>
                    <div class="header-top-item">
                        <a href="<?php echo home_url(); ?>" target="_blank"><img
                                src="<?php echo URL_THEME; ?>/assets/images/mad-shade.png" alt="Mad Shade"
                                loading="lazy"></a>
                    </div>
                    <div class="header-top-item">
                        <a href="https://kissgelpro.com" target="_blank"><img
                                src="<?php echo URL_THEME; ?>/assets/images/kiss-new-york.png" alt="Kiss New York"
                                loading="lazy"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="header-main-hambuger">
                <ion-icon name="reorder-three-outline"></ion-icon>
            </div>
            <div class="header-main-logo">
                <a href="<?php echo home_url('/') ?>">
                    <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo() ?>
                    <?php endif; ?>
                </a>
            </div>
            <div class="header-main-search">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="header-bottom">
            <?php
            wp_nav_menu( array(
                'theme_location'  => 'main_menu',
                'depth'           => 2,
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
            ) );
        ?>
        </div>
    </header>
    <aside id="aside">
        <div class="layout-icon">

            <ion-icon name="close-outline"></ion-icon>
        </div>
        <div class="aside-menu">
            <?php
        wp_nav_menu(array(
            'theme_location'  => 'main_menu',
            'depth'           => 2,
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => '',
        ));
        ?>

        </div>
    </aside>