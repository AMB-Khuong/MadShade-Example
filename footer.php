<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amoeba
 */

use Google\Service\PeopleService\Url;

?>
<footer class="footer">



    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-11 col-lg-8">
                <img src="//cdn-1797.cafe24img.com/ivyusa/MADSHADE/logo/MADSHADE_Logo_white.png" class="img-fluid w-100"
                    style="max-width: 200px">
                &nbsp;
            </div>
            <div class="col mt-3 mt-lg-0">
                <div class="row">
                    <div class="d-none d-lg-block col flex-column">
                        <p class="madshade_footer_heading mb-4" style="color: #ffffff; font-weight: bold;">
                            LEARN MORE
                        </p>
                        <a href="/mad-shade/contact-us/ " style="text-decoration: none; color: #ffffff;"
                            aria-label="Contact Us">
                            <p class="madshade_footer_category">CONTACT US</p>
                        </a>
                    </div>
                    <div class="d-none d-lg-block col">
                        <p class="madshade_footer_heading mb-4" style="color: #ffffff; font-weight: bold;">
                            LEGAL
                        </p>
                        <a class="terms" href="/terms-conditions" style="text-decoration: none; color: #ffffff"
                            aria-label="Terms and conditions">
                            <p class="madshade_footer_category">TERMS &amp; CONDITIONS</p>
                        </a>
                        <a href="/privacy-policy" style="text-decoration: none; color: #ffffff"
                            aria-label="Privacy policy">
                            <p class="madshade_footer_category">PRIVACY POLICY</p>
                        </a>
                    </div>
                    <div class="d-lg-none col" style="display: none">
                        <p class="madshade_footer_heading mb-4" style="color: #ffffff">
                            LEARN MORE
                        </p>
                    </div>
                    <div class="d-lg-none col flex-column" style="display: none">
                        <a href="/find-a-store.html" style="text-decoration: none; color: #ffffff"
                            aria-label="Store locator">
                            <p class="madshade_footer_category m-0">STORE LOCATOR</p>
                        </a>
                    </div>
                </div>
                <div class="d-lg-none row">
                    <div class="col">
                        <p class="madshade_footer_heading mb-4" style="color:#ffffff">
                            LEGAL
                        </p>
                    </div>
                    <div class="col flex-column">
                        <a class="terms" href="/terms-conditions" style="text-decoration: none; color: #ffffff"
                            aria-label="Terms and conditions">
                            <p class="madshade_footer_category m-0">TERMS &amp; CONDITIONS</p>
                        </a>
                        <a href="/privacy-policy/" style="text-decoration: none; color: #ffffff"
                            aria-label="Privacy policy">
                            <p class="madshade_footer_category m-0">PRIVACY POLICY</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:50px">
            <div class="d-none d-lg-block col-6 col-lg-10" style="color:#ffffff">
                © 2023 MADSHADE. ALL RIGHTS RESERVED.
            </div>
        </div>
        <div class="d-lg-none" style="color: #ffffff">
            © 2023 MADSHADE. ALL RIGHTS RESERVED.
        </div>
    </div>
</footer>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php wp_footer(); ?>

</body>

</html>