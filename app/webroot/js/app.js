(function($){
    $('#header__icon').click(function(e){
        e.preventDefault();
        $('#home').toggleClass('with--sidebar');
    });


   $('#site-cache').click(function(e){
       $('body').removeClass('with--sidebar');
   })

})(jQuery);
