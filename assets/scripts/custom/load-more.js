document.addEventListener("DOMContentLoaded", () => {
    const loadMoreButton = document.getElementById("load-more");
	let currentPage = 1;

	loadMoreButton.addEventListener("click",() => {
		console.log("first")
		  $.ajax({
              type: "POST",
              url: "/wp-admin/admin-ajax.php",
              dataType: "html",
              data: {
                  action: "weichie_load_more",
                  paged: currentPage,
              },
              success: function (res) {
                  $(".blog__list").append(res);
              },
          });
	});
});
