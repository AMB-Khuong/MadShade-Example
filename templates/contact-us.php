<?php

/**
 * Template Name: Contact Us
 */
get_header();
?>

<section id="contact">
    <div class="banner-container">
        <div class="banner-content">
            <p>SHOP ONLINE Available on</p>
            <a href="https://www.ivyusa.com">IVYUSA.COM</a>
        </div>

    </div>
</section>
<section id="contact-content">
    <div class="container my-5">
        <div class="text-center my-5">
            <p class="title">CONTACT US!</p>
            <p style="font-size: x-large; font-family: Changa">
                Please complete the form below and we will respond within 24-48
                hours.
            </p>
        </div>
        <?php
    // echo do_shortcode('[contact-form-7 id="12a2c6c" title="Contact Form Madshade"]');
    echo do_shortcode('[contact-form-7 id="5808a60" title="Contact Form Madshade"]');
    ?>

    </div>


</section>

<?php
get_footer();