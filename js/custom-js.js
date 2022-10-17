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


        $('.back-to-top').on('click', function(e){
            e.preventDefault();

            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        });
    });
})(jQuery);