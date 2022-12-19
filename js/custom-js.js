(function ($) {

	$.fn.countTo = function (options) {
		// merge the default plugin settings with the custom options
		options = $.extend({}, $.fn.countTo.defaults, options || {});

		// how many times to update the value, and how much to increment the value on each update
		var loops = Math.ceil(options.speed / options.refreshInterval),
			increment = (options.to - options.from) / loops;

		return $(this).each(function () {
			var _this = this,
				loopCount = 0,
				value = options.from,
				interval = setInterval(updateTimer, options.refreshInterval);

			function updateTimer() {
				value += increment;
				loopCount++;
				$(_this).html(
					value
						.toFixed(options.decimals)
						.toString()
						.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
				);

				if ($(_this).data("counter-append") !== "") {
					$(_this).append($(_this).data("counter-append"));
				}

				if (typeof options.onUpdate == "function") {
					options.onUpdate.call(_this, value);
				}

				if (loopCount >= loops) {
					clearInterval(interval);
					value = options.to;

					if (typeof options.onComplete == "function") {
						options.onComplete.call(_this, value);
					}
				}
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0, // the number the element should start at
		to: 100, // the number the element should end at
		speed: 1000, // how long it should take to count between the target numbers
		refreshInterval: 100, // how often the element should be updated
		decimals: 0, // the number of decimal places to show
		onUpdate: null, // callback method for every time the element is updated,
		onComplete: null, // callback method for when the element finishes updating
	};

	function checkCounterNumberVisible(selector) {
		selector.not(".counter-started").each(function () {
			if ($(this).visible()) {
				$maxNum = parseInt($(this).data("counter"));
				$(this).addClass("counter-started");

				$(this).countTo({
					from: 0,
					to: $maxNum,
					speed: 3000,
					refreshInterval: 50,
					onComplete: function (value) {
						console.debug(this);
					},
				});
			}
		});
	}

	$(function () {
		if ($(".counter-item-wrapper").length !== 0) {
			checkCounterNumberVisible($(".counter-item-wrapper .heading"));

			$(window).on("scroll", function () {
				checkCounterNumberVisible($(".counter-item-wrapper .heading"));
			});
		}

		if ($(".testimonial-slider").length !== 0) {
			$(".testimonial-slider").slick({
				slidesToShow: 1,
				dots: true,
				arrows: false,
			});
		}

		if ($(".s-slider").length !== 0) {
			$(".text-gallery-images-slider").slick({
				slidesToShow: 3,
				dots: false,
				arrows: false,
				responsive: [
					{
						breakpoint: 9999,
						settings: {
							slidesToShow: 3,
						},
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 2,
						},
					},
				],
			});
		}
		// $('.post-list-item-wrapper').mouseenter( function(){
		//     $('> div:last-child', this).slideDown();
		// }).mouseleave(function(){
		//     $('> div:last-child', this).slideUp();
		// });

		if ($(".testimonials-slider").length !== 0) {
			$(".testimonials-slider").slick({
				slidesToShow: 3,
				dots: false,
				arrows: true,
				prevArrow:
					'<button class="slick-arrow slick-prev"><svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="60" transform="matrix(-1 0 0 1 61 1)" stroke="#BFBFBF"/><path d="M28.5718 26.3579L23.1506 31.7791M23.1506 31.7791L28.5719 37.2003M23.1506 31.7791L37.9998 31.7781" stroke="#263238" stroke-width="2"/></svg></button>',
				nextArrow:
					'<button class="slick-arrow slick-next"><svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="1" y="1" width="60" height="60" stroke="#BFBFBF"/><path d="M33.4282 26.3579L38.8494 31.7791M38.8494 31.7791L33.4281 37.2003M38.8494 31.7791L24.0002 31.7781" stroke="#263238" stroke-width="2"/></svg></button>',
				responsive: [
					{
						breakpoint: 9999,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							arrows: true,
						},
					},
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
						},
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						},
					},
				],
			});
		}

		if ($(".posts-slider").length !== 0) {
			$(".posts-slider").slick({
				slidesToShow: 3,
				dots: false,
				arrows: true,
				prevArrow:
					'<button class="slick-arrow slick-prev"><svg width="16" height="25" viewBox="0 0 16 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 2L3.5 12.5L14 23" stroke="#263238" stroke-width="4"/></svg></button>',
				nextArrow:
					'<button class="slick-arrow slick-next"><svg width="16" height="25" viewBox="0 0 16 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2L12.5 12.5L2 23" stroke="#263238" stroke-width="4"/></svg></button>',
				responsive: [
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						},
					},
				],
			});
		}

		$(".back-to-top").on("click", function (e) {
			e.preventDefault();

			$("html, body").animate(
				{
					scrollTop: 0,
				},
				"slow"
			);
		});

		$(document).on("click", ".branch-item-details a", function (e) {
			e.preventDefault();

			$targetID = $(this).data("branch-target-detail");

			$(".branch-result-main-list").removeClass("show").addClass("hide");
			$(".branch-result-list-details").removeClass("hide").addClass("show");

			$(".branch-result-list-detail-wrapper").addClass("hide");

			$(
				'.branch-result-list-detail-wrapper[data-branch-detail="' +
					$targetID +
					'"]'
			)
				.removeClass("hide")
				.addClass("show");
		});

		$(document).on("click", ".branch-result-list-details-toggle", function () {
			$(".branch-result-main-list").removeClass("hide").addClass("show");
			$(".branch-result-list-details").removeClass("show").addClass("hide");
			$('.branch-result-list-detail-wrapper').removeClass("hide show");
		});

		$("#branch-finder-toggle").click(function () {
			$(this).closest("form").submit();
		});

		$('#state-picker').on('change', function(){
			$(this).closest("form").submit();
		});

		$(".main-header-hamburger-toggle").on("click", function () {
			$(".main-header-menu").toggleClass("active");
		});

		$(document).mouseup(function (e) {
			var container = $(".menu-main-menu-container");

			// if the target of the click isn't the container nor a descendant of the container
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				$(".main-header-menu").removeClass("active");
			}
		});

		$(".form-control")
			.focus(function () {
				$(this).closest(".form-group").addClass("active");
			})
			.focusout(function () {
				if ($(this).val() == "") {
					$(this).closest(".form-group").removeClass("active");
				}
			});

		$(".form-control").keyup(function () {
			if ($(this).val() !== "") {
				$(this).closest(".form-group").addClass("active");
			} else {
				$(this).closest(".form-group").removeClass("active");
			}
		});

		$("#commentform .form-submit input").val("Submit");


		$(window).ready(function(){
			if( $('.archive-item-image-gallery').length !== 0 ){

				$('.archive-item-image-gallery').each(function(){
					$lightGalleryID = $(this).attr('id');

					lightGallery( document.getElementById( $lightGalleryID ), {
						speed: 500,
						licenseKey: '`0000-0000-000-0000',
						plugins: [lgZoom, lgAutoplay, lgFullscreen , lgHash, lgRotate, lgShare, lgThumbnail, lgVideo],
					} );
				});
			}
		});

		// $('.view-archive-toggle').on('click', function(e){
		// 	e.preventDefault();

		// 	if( $(this).hasClass('view-issue') ){
		// 		$(this).closest('.archive-gems-post-item').find('.flipbook-custom-container').addClass('visible');
		// 		$(this).closest('.archive-gems-post-item').find('.solid-container').FlipBook({pdf: $(this).closest('.archive-gems-post-item').find('.solid-container').attr('src')});
		// 		// $(this).closest('.archive-gems-post-item').find('.archive-item-image-gallery a:first-child')[0].click();
		// 	}else{
		// 		$(this).closest('.archive-gems-featured-wrapper').find('.flipbook-custom-container').addClass('visible');
		// 		$(this).closest('.archive-gems-featured-wrapper').find('.solid-container').FlipBook({pdf: $(this).closest('.archive-gems-featured-wrapper').find('.solid-container').attr('src')});
		// 		// $(this).closest('.archive-gems-featured-wrapper').find('.archive-item-image-gallery a:first-child')[0].click();
		// 	}
		// });


		$('.step-item-image').on('click', function(){
			$stepTarget = $(this).data('step-content');
			
			$('.step-item-image').removeClass('active');
			$(this).addClass('active');

			$('section.our-suppliers-section').addClass('hide');
			$('#'+ $stepTarget).removeClass('hide');
		});


		if( $('.client-logos-wrapper').length !== 0 ){
			let tickerSpeed = 0.5;
			let flickity = null;
			let isPaused = false;
			const slideshowEl = document.querySelector('.client-logos-wrapper');

			const update = () => {
			if (isPaused) return;
			if (flickity.slides) {
				flickity.x = (flickity.x - tickerSpeed) % flickity.slideableWidth;
				flickity.selectedIndex = flickity.dragEndRestingSelect();
				flickity.updateSelectedSlide();
				flickity.settle(flickity.x);
			}
			window.requestAnimationFrame(update);
			};

			flickity = new Flickity(slideshowEl, {
				autoPlay: false,
				prevNextButtons: false,
				pageDots: false,
				draggable: true,
				wrapAround: true,
				selectedAttraction: 0.015,
				friction: 0.25
			});
			flickity.x = 0;

			// flickity.on('dragStart', () => {
			// 	isPaused = true;
			// });

			update();

			let flickity2 = null;
			let isPaused2 = false;
			const slideshowEl2 = document.querySelector('.client-logos-wrapper.reverse');

			const update2 = () => {
			if (isPaused2) return;
			if (flickity2.slides) {
				flickity2.x = (flickity2.x - tickerSpeed) % flickity2.slideableWidth;
				flickity2.selectedIndex = flickity2.dragEndRestingSelect();
				flickity2.updateSelectedSlide();
				flickity2.settle(flickity2.x);
			}
			window.requestAnimationFrame(update2);
			};

			flickity2 = new Flickity(slideshowEl2, {
				autoPlay: false,
				prevNextButtons: false,
				pageDots: false,
				draggable: true,
				wrapAround: true,
				selectedAttraction: 0.015,
				friction: 0.25,
				rightToLeft: false
			});
			flickity2.x = 0;

			// flickity2.on('dragStart', () => {
			// 	isPaused2 = true;
			// });

			update2();

			let flickity3 = null;
			let isPaused3 = false;
			const slideshowEl3 = document.querySelector('.client-logos-wrapper.another');

			const update3 = () => {
			if (isPaused3) return;
			if (flickity3.slides) {
				flickity3.x = (flickity3.x - tickerSpeed) % flickity3.slideableWidth;
				flickity3.selectedIndex = flickity3.dragEndRestingSelect();
				flickity3.updateSelectedSlide();
				flickity3.settle(flickity3.x);
			}
			window.requestAnimationFrame(update3);
			};

			flickity3 = new Flickity(slideshowEl3, {
				autoPlay: false,
				prevNextButtons: false,
				pageDots: false,
				draggable: true,
				wrapAround: true,
				selectedAttraction: 0.015,
				friction: 0.25,
			});
			flickity3.x = 0;

			// flickity3.on('dragStart', () => {
			// 	isPaused3 = true;
			// });

			update3();
		}


		$('.member-tab').on('click', function(){
			$('.member-tab, .member-branch-content').removeClass('active');
			$(this).addClass('active');

			$activeTabID = $(this).data('member-filter');

			$('.member-branch-content[data-member-filter="'+ $activeTabID +'"]').addClass('active');
		});
	});

	$(window).on('beforeunload', function(){
		console.log('working');
		$('body').append('<div class="custom-loading-container"><div class="custom-loading"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>');

		$('.custom-loading-container').fadeIn(250);
	});

	$(document).ready(function() {
		if($('body').hasClass('single-gemcell_members')){
			$(".slider-items").slick({
					slidesToShow: 1,
					dots: false,
					arrows: true,
					prevArrow:
						'<button class="slick-arrow slick-prev"><svg width="16" height="25" viewBox="0 0 16 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 2L3.5 12.5L14 23" stroke="#263238" stroke-width="4"/></svg></button>',
					nextArrow:
						'<button class="slick-arrow slick-next"><svg width="16" height="25" viewBox="0 0 16 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2L12.5 12.5L2 23" stroke="#263238" stroke-width="4"/></svg></button>',
					
			});
		}
	});


})(jQuery);
