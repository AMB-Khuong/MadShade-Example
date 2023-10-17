<?php
/**
 * Template Name: Privacy Policy
 */
get_header();
?>
<section id="privacy-policy">
    <div class="banner-container">
        <div class="banner-content">
            <p>SHOP ONLINE Available on</p>
            <a href="https://www.ivyusa.com">IVYUSA.COM</a>
        </div>

    </div>
</section>
<section id="privacy-content">
    <div class="container my-5" style="text-align: justify">
        <?php 
          if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif;
       ?>
    </div>

</section>

<?php
get_footer();