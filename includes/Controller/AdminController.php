<?php

/**
 * @package Amoeba
 */

namespace Amoeba\Inc\Controller;

use Amoeba\Inc\Controller\BaseController;

class AdminController extends BaseController
{
    const maxYoutube = 10;
    public function register()
    {

        if (is_admin()) {
            add_action('add_meta_boxes', array($this, 'addProductMetaBox'));
        }
        //Add additional field to product category - woocommerce
        add_action('product_cat_add_form_fields', array($this, 'add_custom_banner_category'), 10, 2);
        add_action('created_product_cat', array($this, 'save_custom_banner_category'), 10, 2);
        add_action('product_cat_edit_form_fields', array($this, 'edit_custom_banner_category'), 10, 2);
        add_action('edited_product_cat', array($this, 'update_custom_banner_category'), 10, 2);
    }

    function addProductMetaBox()
    {
        add_meta_box(
            'amoeba-woocommerce-social-link-gallery',
            __('Youtube', 'ivyusa_textdomain'),
            array($this, 'youtubeProduct'),
            'product',
            'side',
            'default'
        );
    }

    function add_custom_banner_category()
    {
?>
<div class="form-field">
    <label for="custom_field">Custom banner</label>
    <input type="text" name="custom_banner_category" id="custom_banner_category" value="">
</div>
<?php
    }

    function save_custom_banner_category($term_id)
    {
        if (isset($_POST['custom_banner_category'])) {
            $custom_field = sanitize_text_field($_POST['custom_banner_category']);
            update_term_meta($term_id, 'custom_banner_category', $custom_field);
        }
    }

    function edit_custom_banner_category($term)
    {
        $custom_field = get_term_meta($term->term_id, 'custom_banner_category', TRUE);
    ?>
<tr class="form-field">
    <th scope="row" valign="top">
        <label for="custom_banner_category">Custom banner</label>
    </th>
    <td>
        <input type="text" name="custom_banner_category" id="custom_banner_category"
            value="<?php
                                                                                                    echo esc_attr($custom_field); ?>">
    </td>
</tr>
<?php
    }

    function update_custom_banner_category($term_id)
    {
        if (isset($_POST['custom_banner_category'])) {
            $custom_field = sanitize_text_field($_POST['custom_banner_category']);
            update_term_meta($term_id, 'custom_banner_category', $custom_field);
        }
    }

      // Youtube Product
      function youtubeProduct($post)
      {
          for($i = 1; $i <= self::maxYoutube; $i++) {
              $youtubeURL = get_post_meta($post->ID, '_video_link_'. $i, TRUE);
              echo('<p class="form-field">');
              echo('<label for="video_link">Youtube URL '.$i.' </label>');
              echo('<input type="text" id="video_link_'.$i.'" name="video_link_'.$i.'" value="' . esc_attr($youtubeURL) . '" />');
              echo('</p>');
          }
      }

    
}