document.addEventListener("DOMContentLoaded", function () {
  const summary = document.querySelector(".summary.entry-summary");
  const priceDetail = summary.querySelector(".price");
  const spanPriceNumber = priceDetail.querySelector(
    ".woocommerce-Price-amount"
  );
  const descriptProductDetail = summary.querySelector(
    ".woocommerce-product-details__short-description"
  );

  // Tạo phần tử <path> trong <svg>
  const pathElement = document.createElementNS(
    "http://www.w3.org/2000/svg",
    "path"
  );
  pathElement.setAttribute("d", "M6 9l6 6 6-6");

  const aDiv = document.querySelector(".row");
  const bDiv = aDiv.querySelector("section.products");

  bDiv && aDiv.parentNode.appendChild(bDiv);

  const titlePrice = document.createElement("span");

  titlePrice.className = "title-price";
  titlePrice.textContent = "Price";

  priceDetail.insertBefore(titlePrice, spanPriceNumber);
  // descriptProductDetail &&
  //   descriptProductDetail.insertAdjacentHTML("afterend", newElementHTML);
});

jQuery(document).ready(function ($) {
  const galleryMain = $(
    ".single-product-left .woocommerce-product-gallery"
  ).first();

  $settingSlick = {
    slidesToShow: 6,
    infinite: true,
    loop: true,
    slidesToScroll: 1,
    vertical: true,
    dots: false,
    focusOnSelect: true,

    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          vertical: false,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          vertical: false,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          vertical: false,
          infinite: true,
          dots: true,
        },
      },
    ],
  };

  $slickThumbnailSingleProduct = galleryMain.find(".flex-control-thumbs");
  $slickThumbnailSingleProduct.slick($settingSlick);

  galleryMain.find(".flex-next").on("click", function () {
    galleryMain.find(".slick-next").click();
  });

  galleryMain.find(".flex-prev").on("click", function () {
    galleryMain.find(".slick-prev").click();
  });

  //Product Additional Info Tab
  $(".product-tabs__text:first").show();
  $(".product-tabs__title li").click(function () {
    const id = $(this).attr("role");
    $(".product-tabs__text").hide();
    $(".product-tabs__title li").removeClass("active");
    $("#" + id).fadeIn("fast");
    $(this).addClass("active");
  });

  //toggle tab content
  const maxHeightTabContent = 150;
  $(".product-tabs__text").each(function () {
    if ($(this).outerHeight() > maxHeightTabContent) {
      $(this).addClass("beyond");
      $(this).append(function () {
        return '<p class="show-more">Show more <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></p>';
      });
    }
  });

  //show more product content function
  $(".product-tabs__text .show-more").on("click", function () {
    const parent = $(this).parent(".product-tabs__text");
    parent.toggleClass("active");
    if (parent.hasClass("active")) {
      $(this).html(
        `Show less <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 15l-6-6-6 6"/></svg>`
      );
    } else {
      $(this).html(
        `Show more <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>`
      );
    }
  });
});
