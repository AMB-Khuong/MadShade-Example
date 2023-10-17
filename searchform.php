<?php
/**
 * The searchform.php template.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Madshade
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
?>
<div class="wrap-search">
    <form role="search" method="get" class="search-form " action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" class="search-field" autocomplete="off" value="<?php echo get_search_query(); ?>" name="s" />
        <input type="hidden" value="product" name="post_type" id="post_type">
        <button type="submit" class="search-submit">
            <img src="<?php echo URL_THEME; ?>/assets/images/RK_searchbar.png" alt="Ivy Beauty" loading="lazy"
                class="icon-submit">
        </button>
    </form>

    <img class="icon-mobile-search" src="<?php echo URL_THEME; ?>/assets/images/RK_searchbar.png" alt="Ivy Beauty"
        loading="lazy">
    <img class="icon-mobile-search-x" src="<?php echo URL_THEME; ?>/assets/images/close-outline.svg" alt="Ivy Beauty"
        loading="lazy">


</div>