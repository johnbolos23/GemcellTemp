(function($){
    $.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});
        
        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;
        
        return $(this).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);
            
            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html( (value.toFixed(options.decimals)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                
                if( $(_this).data('counter-append')  !== '' ){
                    $(_this).append( $(_this).data('counter-append') );
                }

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }
                
                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;
                    
                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,  // the number the element should start at
        to: 100,  // the number the element should end at
        speed: 1000,  // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
    };

    function checkCounterNumberVisible( selector ){
        selector.not('.counter-started').each(function(){
            if( $(this).visible( ) ){   
                $maxNum = parseInt( $(this).data('counter') );
                $(this).addClass('counter-started');
                
                $(this).countTo({
                    from: 0,
                    to: $maxNum,
                    speed: 3000,
                    refreshInterval: 50,
                    onComplete: function(value) {
                        console.debug(this);
                    }
                });
            }
        });
    }

    $(function(){ 

        if( $('.counter-item-wrapper').length !== 0 ){
            checkCounterNumberVisible( $('.counter-item-wrapper .heading') ); 
            
            $(window).on('scroll', function(){
                checkCounterNumberVisible( $('.counter-item-wrapper .heading') ); 
            });
        }

        if( $('.testimonial-slider').length !== 0 ){
            $('.testimonial-slider').slick({
                slidesToShow: 1,
                dots: true,
                arrows: false,
            });
        }

        if( $('.text-gallery-images-slider').length !== 0 ){
            $('.text-gallery-images-slider').slick({
                slidesToShow: 3,
                dots: false,
                arrows: false,
            });
        }
        // $('.post-list-item-wrapper').mouseenter( function(){
        //     $('> div:last-child', this).slideDown();
        // }).mouseleave(function(){
        //     $('> div:last-child', this).slideUp();
        // });

        if( $('.testimonials-slider').length !== 0 ){
            $('.testimonials-slider').slick({
                slidesToShow: 3,
                dots: false,
                arrows: true,
            });
        }

        if( $('.posts-slider').length !== 0 ){
            $('.posts-slider').slick({
                slidesToShow: 3,
                dots: false,
                arrows: true,
                prevArrow: '<button class="slick-arrow slick-prev"><svg width="16" height="25" viewBox="0 0 16 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 2L3.5 12.5L14 23" stroke="#263238" stroke-width="4"/></svg></button>',
                nextArrow: '<button class="slick-arrow slick-next"><svg width="16" height="25" viewBox="0 0 16 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2L12.5 12.5L2 23" stroke="#263238" stroke-width="4"/></svg></button>',
            });
        }


        $('.back-to-top').on('click', function(e){
            e.preventDefault();

            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        });


        $(document).on('click', '.branch-item-details a', function(e){

            e.preventDefault();

            $targetID = $(this).data('branch-target-detail');

            $('.branch-result-main-list').removeClass('show').addClass('hide');
            $('.branch-result-list-details').removeClass('hide').addClass('show');

            $('.branch-result-list-detail-wrapper').addClass('hide');

            $('.branch-result-list-detail-wrapper[data-branch-detail="'+ $targetID +'"]').removeClass('hide').addClass('show');
        });

        $(document).on('click', '.branch-result-list-details-toggle', function(){
            $('.branch-result-main-list').removeClass('hide').addClass('show');
            $('.branch-result-list-details').removeClass('show').addClass('hide');
        });


        $('#branch-finder-toggle').click(function(){
            $(this).closest('form').submit();
        });


        $('.main-header-hamburger-toggle').on('click', function(){
            $('.main-header-menu').toggleClass('active');
        });

        $(document).mouseup(function(e){
            var container = $(".menu-main-menu-container");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                $('.main-header-menu').removeClass('active');
            }
        });

        $('.form-control').focus( function(){
            $(this).closest('.form-group').addClass('active');
        }).focusout(function(){
            if( $(this).val() == '' ){
                $(this).closest('.form-group').removeClass('active');
            }
        });

        $('.form-control').keyup( function(){
            if( $(this).val() !== '' ){
                $(this).closest('.form-group').addClass('active');
            }else{
                $(this).closest('.form-group').removeClass('active');
            }
        });

        $('#commentform .form-submit input').val('Submit');
    });
})(jQuery);