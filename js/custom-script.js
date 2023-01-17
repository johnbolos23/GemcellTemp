(function ($) {
	$(".owl-carousel.member-list-slider").owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 1,
			},
			1000: {
				items: 1,
			},
		},
	});

	$(".owl-carousel.pattern-banner-slider").owlCarousel({
		loop: false,
		nav: false,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 1,
			},
			1000: {
				items: 1,
			},
		},
	});

	$(document).ready(function () {
		$(".tab-nav li").click(function () {
			$(".tab-nav li.active").removeClass("active");
			$(this).addClass("active");
		});
		$(".tab-nav li:first-child").addClass("active");
	});
})(jQuery);

function ajaxPaginationCategory(page_num = null, category = "") {
	console.log(page_num);
	if (page_num === null) {
		page_num = jQuery(".custom-pagination .page-numbers.current").html();
	}

	if (category === "") {
		category = jQuery('.js-filter-form select[name="categories"]').val();
	}
	console.log(category);

	jQuery.ajax({
		type: "post",
		dataType: "json",
		url: myAjax.ajaxurl,
		data: {
			action: "fetch_blog_list",
			category: category,
			page_num: page_num,
		},
		success: function (response) {
			console.log(response);
			jQuery(".post-list-cont").html(response.content);
			jQuery(".custom-pagination").html(response.content_paginate);
			//             update_page_list_class();
			//jQuery('.load_more_cont a').data("pagenum", response.next_page);
			//jQuery('.load_more_cont a').attr('data-pagenum', response.next_page);
		},
	});
}

jQuery(document).on("click", ".custom-pagination .page-numbers", function (e) {
	e.preventDefault();

	var check_num = jQuery(this).html();
	var check_num_check = check_num.includes("Next");
	var check_num_check_newer = check_num.includes("Previous");

	if (check_num_check) {
		check_num = parseInt(jQuery(".custom-pagination span.current").html()) + 1;
	}

	if (check_num_check_newer) {
		check_num = parseInt(jQuery(".custom-pagination span.current").html()) - 1;
	}

	jQuery(".custom-pagination a").removeClass("current");
	jQuery(".custom-pagination span").removeClass("current");

	jQuery(this).addClass("current");

	/* Call function to ajax */
	ajaxPaginationCategory(check_num, "");

	//      jQuery.ajax({
	//        type : "post",
	//        dataType : "json",
	//        url : myAjax.ajaxurl,
	//        data : { action: "fetch_blog_list", page_num: check_num },
	//        success: function(response) {
	//
	//            console.log(response);
	//            jQuery('.post-list-cont').html(response.content);
	//            jQuery('.custom-pagination').html(response.content_paginate);
	////             update_page_list_class();
	//            //jQuery('.load_more_cont a').data("pagenum", response.next_page);
	//            //jQuery('.load_more_cont a').attr('data-pagenum', response.next_page);
	//
	//        }
	//     });
});

(function ($) {
	$(document).ready(function () {
		$(document).on(
			"change",
			'.js-filter-form select[name="categories"]',
			function (e) {
				e.preventDefault();

				var category = $(this).val();
				//       var category = $(this).data('category');

				ajaxPaginationCategory(null, category);

				console.log("working");
				//      $.ajax({
				//        url : myAjax.ajaxurl,
				//		  dataType : "json",
				//        data : {action: 'filter_ajax', category: category},
				//        type : "post",
				//        success: function(response) {
				//			console.log( response.content );
				//          $('.js-filter').html(response.content);
				//        },
				//        error:function(response){
				//          console.warn (response);
				//        }
				//      });
			}
		);
	});
})(jQuery);

$(document).ready(function () {
	$(".video-popup-trigger svg").on("click", function (ev) {
		$(".information-with-video-video img").css("display", "none");
		$(".video-popup-trigger").css("display", "none");

		$(".embed-container").css("display", "block");

		$(".embed-container iframe")[0].src += "&autoplay=1";
		ev.preventDefault();
	});
	
	$("section.step-by-step .step-by-step-wrapper .step-by-steps .step-item.step-item.step-3 .step-item-image").click();
});


