<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amoeba Group
 */
?>
<?php get_header(); ?>

<main>
    <section id="shop-online">
        <?php require 'includes/shop-online.php'; ?>
    </section>

    <section id="slider">
        <?php require 'includes/banner.php'; ?>
    </section>

    <section id="video">
        <div class="madshade_video_banner">
            <div class="madshade_video_web">
                <div style="padding: 56.25% 0 0 0; position: relative">
                    <iframe
                        src="https://player.vimeo.com/video/834388737?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;autoplay=1&amp;muted=1&amp;loop=1"
                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" style="
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                " title="MadShade_DoengHun_2023_5_18-32sec-Hero-Re"></iframe>
                </div>
            </div>
            <div class="madshade_video_mobile hidden">
                <div style="padding: 177.78% 0 0 0; position: relative">
                    <iframe
                        src="https://player.vimeo.com/video/834389681?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;autoplay=1&amp;muted=1&amp;loop=1"
                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" style="
                  position: absolute;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                " title="MadShade_DoengHun_2023_5_18-32sec-vertical"></iframe>
                </div>
            </div>
        </div>

    </section>

    <section id="madshade_section_2">
        <div class="row mt-5 no-gutters g-0">
            <div class="col-12 col-lg-6">
                <div class="madshade_category_title text-center">2023 NEW</div>
                <a href="<?php echo esc_url(get_category_link(31)); ?>" aria-label="2023 NEW">
                    <img src="//cdn-1797.cafe24img.com/ivyusa/MADSHADE/banner/IVY_BNR_MADSHADE_SUB_20230616_01.jpg"
                        style="width: 100%; height: auto; margin-top: 10px">
                </a>
            </div>
            <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                <div class="madshade_category_title text-center">SIGNATURES</div>
                <a href="<?php echo esc_url(get_category_link(33)); ?>" aria-label="SIGNATURES">
                    <img src="//cdn-1797.cafe24img.com/ivyusa/MADSHADE/banner/IVY_BNR_MADSHADE_SUB_20230616_05.jpg"
                        style="width: 100%; height: auto; margin-top: 10px">
                </a>
            </div>
        </div>

        <div style="width: 100%; background-color: #ececec">
            <div class="slider-products">

                <?php
                $category_slug = '2023-new'; // Thay 'category-slug' bằng slug của category bạn muốn lấy sản phẩm

                // Sử dụng do_shortcode để thực thi shortcode [product_category]
                $products = do_shortcode('[product_category category="' . $category_slug . '"  class="slider-products" ]');


                // Hiển thị danh sách sản phẩm
                echo $products;
                ?>

            </div>
            <div class="text-center">
                <button class="madshade_trending_btn my-4" onclick="location.href='/product-category/2023-new/'">
                    SHOP THE TRENDING
                </button>
            </div>
        </div>
    </section>

    <section id="madshade_section_3">
        <div class="madshade_category_title text-center mt-5">
            BY LOOKS
        </div>
        <div class="slide-submenu">
            <?php
            $parent_category_id = 34;
            $cat_args = array(
                'taxonomy'   => "product_cat",
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => false,
                'parent'     => $parent_category_id
            );
            $child_categories = get_terms($cat_args);
            if ($child_categories):
                foreach ($child_categories as $subcategory):
                    // Display subcategory title
                    $catagory_id = $subcategory->term_id;
                    $subcategory_link = esc_url(get_category_link($subcategory->term_id));
                    echo '<div class="slide-submenu-item" >';

                    echo '<a src="#" href="' . $subcategory_link . '">';
                    echo '<h2>' . esc_html($subcategory->name) . '</h2>';
                    // Display subcategory image (if you have set it)
                    $subcategory_image_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                    if ($subcategory_image_id) {
                        $subcategory_image_url = wp_get_attachment_url($subcategory_image_id);
                        echo '<img src="' . esc_url($subcategory_image_url) . '" alt="' . esc_attr($subcategory->name) . '" />';
                    }
                    echo '</a>';
                    echo '</div>';
                endforeach;
             
               
            else :
                echo 'No subcategories found.';
            endif;
            ?>

        </div>
    </section>

    <section id="best_seller">
        <div class="madshade_category_title text-center mt-5">BEST SELLER</div>
        <div class="slider_bestseller ">
            <?php
                $category_slug = 'best-seller'; // Thay 'category-slug' bằng slug của category bạn muốn lấy sản phẩm

                // Sử dụng do_shortcode để thực thi shortcode [product_category]
                $products = do_shortcode('[product_category category="' . $category_slug . '" columns="5" class="slider-products" ]');


                // Hiển thị danh sách sản phẩm
                echo $products;
                ?>
        </div>
    </section>

    <section id="color">
        <div class="madshade_category_title text-center " style="margin-bottom: 20px">
            COLOR CATEGORY
        </div>
        <div class="row my-5 px-5">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-4">
                        <div class="madshade_color_overlay">
                            <a href="/product-category/pink/" aria-label="Shop Pink">
                                <img src="//cdn-1797.cafe24img.com/ivyusa/web/upload/event/mad_shade/Asset9.png"
                                    alt="Pink" style="width: 90%; height: auto">
                                <div class="madshade_overlay" style="background-color: #caaab5">
                                    <div class="madshade_overlay_text">PINK</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="madshade_color_overlay">
                            <a href="/product-category/yellow/" aria-label="Shop Yellow">
                                <img src="//cdn-1797.cafe24img.com/ivyusa/web/upload/event/mad_shade/Asset10.png"
                                    alt="Yellow" style="width: 90%; height: auto">
                                <div class="madshade_overlay" style="background-color: #ceac4b">
                                    <div class="madshade_overlay_text">YELLOW</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="madshade_color_overlay">
                            <a href="/product-category/brown/" aria-label="Shop Brown">
                                <img src="//cdn-1797.cafe24img.com/ivyusa/web/upload/event/mad_shade/Asset11.png"
                                    alt="Brown" style="width: 90%; height: auto">
                                <div class="madshade_overlay" style="background-color: #b89c86">
                                    <div class="madshade_overlay_text">BROWN</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <div class="row">
                    <div class="col-4">
                        <div class="madshade_color_overlay">
                            <a href="/product-category/blue/" aria-label="Shop Blue">
                                <img src="//cdn-1797.cafe24img.com/ivyusa/web/upload/event/mad_shade/Asset7.png"
                                    alt="Blue" style="width: 90%; height: auto">
                                <div class="madshade_overlay" style="background-color: #5980b9">
                                    <div class="madshade_overlay_text">BLUE</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="madshade_color_overlay">
                            <a href="/product-category/black-white/" aria-label="Shop Black and White">
                                <img src="//cdn-1797.cafe24img.com/ivyusa/web/upload/event/mad_shade/Asset8.png"
                                    alt="Black and White" style="width: 90%; height: auto">
                                <div class="madshade_overlay" style="background-color: #5d5d65">
                                    <div class="madshade_overlay_text">BLACK/WHITE</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="madshade_color_overlay">
                            <a href="/product-category/green/" aria-label="Shop Green">
                                <img src="//cdn-1797.cafe24img.com/ivyusa/web/upload/event/mad_shade/Asset6.png"
                                    alt="Green" style="width: 90%; height: auto">
                                <div class="madshade_overlay" style="background-color: #6b6a55">
                                    <div class="madshade_overlay_text">GREEN</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>



<?php get_footer(); ?>