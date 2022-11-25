 
  $('.modal .cmd-close').click(function(e) {
    e.preventDefault();
    $('.modal').modal('hide');
  });
  
  // Lightbox Effect
  
  var fb3d = {
    activeModal: undefined,
    capturedElement: undefined
  };
  
  (function() {
    function findParent(parent, node) {
      while(parent && parent!=node) {
        parent = parent.parentNode;
      }
      return parent;
    }
    $('body').on('mousedown', function(e) {
      fb3d.capturedElement = e.target;
    });
    $('body').on('click', function(e) {
      if(fb3d.activeModal && fb3d.capturedElement===e.target) {
        if(!findParent(e.target, fb3d.activeModal[0]) || findParent(e.target, fb3d.activeModal.find('.cmd-close')[0])) {
          e.preventDefault();
          fb3d.activeModal.fb3dModal('hide');
        }
      }
      delete fb3d.capturedElement;
    });
  })();
  $('body').on('keydown', function(e) {
    if(fb3d.activeModal && e.keyCode===27) {
      e.preventDefault();
      fb3d.activeModal.fb3dModal('hide');
    }
  });
  
  $.fn.fb3dModal = function(cmd) {
    setTimeout(function() {
      function fb3dModalShow() {
        if(!this.hasClass('visible')) {
          $('body').addClass('fb3d-modal-shadow');
          this.addClass('visible');
          fb3d.activeModal = this;
          this.trigger('fb3d.modal.show');
        }
      }
      function fb3dModalHide() {
        if(this.hasClass('visible')) {
          $('body').removeClass('fb3d-modal-shadow');
          this.removeClass('visible');
          fb3d.activeModal = undefined;
          this.trigger('fb3d.modal.hide');
        }
      }
      var mdls = this.filter('.fb3d-modal');
      switch(cmd) {
        case 'show':
          fb3dModalShow.call(mdls);
        break;
        case 'hide':
          fb3dModalHide.call(mdls);
        break;
      }
    }.bind(this), 50);
  };

  var instance = {
    scene: undefined,
    options: undefined,
    node: $('.fb3d-modal .mount-container')
  };

  var modal = $('.fb3d-modal');
  modal.addClass('light');
  modal.on('fb3d.modal.hide', function() {
    instance.scene.dispose();
  });
  modal.on('fb3d.modal.show', function() {
    instance.scene = instance.node.FlipBook(instance.options);
  });
  $('.view-archive-toggle').click(function(e) {
    e.preventDefault();
    if( $(this).closest('.archive-gems-post-item').find('.solid-container').attr('src') || $(this).closest('.archive-gems-featured-wrapper').find('.solid-container').attr('src') ){
      instance.options = {
        pdf: $(this).hasClass('view-issue') ? $(this).closest('.archive-gems-post-item').find('.solid-container').attr('src') : $(this).closest('.archive-gems-featured-wrapper').find('.solid-container').attr('src'),
        template: {
          sounds: {"startFlip": themeURL.templateURL + "/sounds/start-flip.mp3","endFlip": themeURL.templateURL + "/sounds/end-flip.mp3"},
        }
      };
      $('.fb3d-modal').fb3dModal('show');
    }
      
  });

