jQuery(document).ready(function ($) {
  let page = 1;
  $(".load-more-btn").on("click", function () {
    const _offset = 12;
    let button = $(this);

    let _total = MAX_PAGE;

    $.ajax({
      url: MADSHADE_ADMIN_URL + "admin-ajax.php",
      type: "POST",
      data: {
        action: "load_more_products_callback",
        offset: page * _offset,
        cateID: $("#page-category").data("slug"), // Slug của danh mục sản phẩm
      },
      beforeSend: function () {
        button.text("Loading..."); // Thay đổi nút thành "Loading..." trong quá trình tải thêm sản phẩm
        button.attr("disabled", "disabled"); // Vô hiệu hóa nút trong quá trình tải thêm sản phẩm
      },
      success: function (response) {
        page++;

        if (response.trim() === "" || page === _total) {
          button.css("display", "none");
        } else {
          button.removeAttr("disabled");
          button.html(
            `See More <span class="btn-current-page">${page}</span>/<span class="btn-max-page">${_total}</span> <ion-icon name="chevron-down-outline"></ion-icon>`
          );
        }

        if (response.trim() !== "") {
          $(".woocommerce ul.products").append(response);
          $(".btn-current-page").text(page);
        }
      },
    });
  });

  let firstPageButton = $(".first-page");
  let lastPageButton = $(".last-page");
  let woocommercePagination = $(".woocommerce-pagination");

  if (firstPageButton.length) {
    firstPageButton.insertBefore(woocommercePagination.find("ul.page-numbers"));
  }

  if (lastPageButton.length) {
    lastPageButton.insertAfter(woocommercePagination.find("ul.page-numbers"));
  }
});
