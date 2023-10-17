<?php
/**
 * Template Name: Terms & Conditions
 */
get_header();
?>
<section id="terms">
    <div class="banner-container">
        <div class="banner-content">
            <p>SHOP ONLINE Available on</p>
            <a href="https://www.ivyusa.com">IVYUSA.COM</a>
        </div>

    </div>


</section>
<section id="terms-content">
    <?php 
          if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif;
       ?>
</section>

<?php
get_footer();