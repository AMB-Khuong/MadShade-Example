const iconMobile =
  document.querySelector(".icon-mobile-search") &&
  document.querySelector(".icon-mobile-search");
const iconMobileX = document.querySelector(".icon-mobile-search-x");
const formMobile = document.querySelector(".search-form");
const liItem = document.querySelectorAll(
  ".aside-menu #menu-main-1 .menu-item-object-product_cat"
);

const productName = document.querySelector(".product_title");
const iconClose = document.querySelector('ion-icon[name="close-outline"]');
const iconHambuger = document.querySelector(
  'ion-icon[name="reorder-three-outline"]'
);
const aside = document.querySelector("aside");
const ionIconElement = document.createElement("ion-icon");
const lineElement = document.createElement("div");
const madshadeVideoWeb = document.querySelector(".madshade_video_web");
const madshadeVideoMobile = document.querySelector(".madshade_video_mobile");
const ulCategoryPage = document.querySelector(".products");
ionIconElement.setAttribute("name", "chevron-down-outline");
ionIconElement.setAttribute("id", "icon-down");
lineElement.setAttribute("class", "line-mobile");

//hide show form input
iconMobile.addEventListener("click", function () {
  formMobile.classList.add("show");
  iconMobile.classList.add("hidden");
  iconMobileX.classList.add("show");
});

iconMobileX.addEventListener("click", function () {
  formMobile.classList.remove("show");
  iconMobile.classList.remove("hidden");
  iconMobileX.classList.remove("show");
});

liItem.forEach((item) => {
  if (item.classList.contains("menu-item-has-children")) {
    item.appendChild(ionIconElement);
    item.appendChild(lineElement);
  }
});

iconHambuger.addEventListener("click", function () {
  aside.classList.add("show");
});

ionIconElement.addEventListener("click", function () {
  ionIconElement.classList.toggle("rotate");
});

iconClose.addEventListener("click", function () {
  aside.classList.remove("show");
});

//swiper
const swiper = new Swiper(".swiper", {
  // Optional parameters

  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },

  // If we need pagination

  // And if we need scrollbar
});
function handleDevice() {
  if (window.innerWidth <= 767) {
    // Xử lý cho thiết bị di động (mobile)
    return "Mobile";
  } else if (window.innerWidth <= 1024) {
    // Xử lý cho máy tính bảng (tablet)
    return "Tablet";
  } else {
    // Xử lý cho máy tính để bàn (desktop)
    return "Desktop";
  }
}

window.addEventListener("resize", function () {
  // Xử lý khi sự kiện resize xảy ra
  const device = handleDevice();
  if (device === "Desktop" || device === "Tablet") {
    madshadeVideoMobile && madshadeVideoMobile.classList.add("hidden");
    madshadeVideoMobile && madshadeVideoWeb.classList.remove("hidden");
  } else {
    madshadeVideoMobile && madshadeVideoMobile.classList.remove("hidden");
    madshadeVideoMobile && madshadeVideoWeb.classList.add("hidden");
  }
});

window.addEventListener("load", function () {
  // Xử lý tại đây sau khi trang đã tải lại
  const device = handleDevice();
  if (device === "Desktop" || device === "Tablet") {
    madshadeVideoMobile && madshadeVideoMobile.classList.add("hidden");
    madshadeVideoMobile && madshadeVideoWeb.classList.remove("hidden");
  } else {
    madshadeVideoMobile && madshadeVideoMobile.classList.remove("hidden");
    madshadeVideoMobile && madshadeVideoWeb.classList.add("hidden");
  }
});

//Jquery
jQuery(document).ready(function (e) {
  const $ = jQuery;

  $(".wpcf7-form-control.wpcf7-submit.has-spinner").val("Submit");
  //top header slider
  $(".header-top-list").slick({
    infinite: true,
    slidesToShow: 7,
    draggable: true,

    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });
  //add slider carousel
  //add owl carousel slider products
  $("#madshade_section_2 .slider-products")
    .find("ul.products")
    .addClass("owl-products owl-carousel owl-theme");
  $("#madshade_section_3")
    .find(".slide-submenu")
    .addClass("owl-products-2 owl-carousel owl-theme");

  $("#best_seller .slider-products")
    .find("ul.products")
    .addClass("owl-products-3 owl-carousel owl-theme");

  //add slide sub menu
  //silde
  $(".owl-products").owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    autoplay: true,
    dots: false,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 2,
      },
      480: {
        items: 2,
      },
      768: {
        items: 3,
      },
      1024: {
        items: 6,
      },
    },
  });

  $(".owl-products-2").owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    dots: false,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
      },
      480: {
        items: 1,
      },
      768: {
        items: 3,
      },
      1024: {
        items: 5.5,
      },
    },
  });

  $(".owl-products-3").owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    margin: 60,
    dots: false,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 2,
      },
      480: {
        items: 2,
      },
      768: {
        items: 3,
      },
      1024: {
        items: 4,
      },
    },
  });
  // Move slick-prev button below the wrapper
  $(".slick-prev").insertBefore(".wpgis-slider-for");

  // Move slick-next button below the wrapper
  $(".slick-next").insertAfter(".wpgis-slider-nav");

  $("#tab-description .show-more").on("click", function () {
    const parent = $(this).parent("#tab-description");
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
