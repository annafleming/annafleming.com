(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('div.work-head').on('click',function(e){
        var article = $(this).parent();
        if (article.find('img').length != 0){
            var infoBlock = article.find('div.work-info');
            infoBlock.stop().slideToggle();
        }
    });

    $('div.message-success button.close').on('click',function(e){
        var el = $(this).parent();
        el.slideUp(600, function(){
            el.remove();
        });
    });


    $.ajax({
        type: 'post',
        url: '/email/send',
        success: function (response) {
        },
        error: function (error) {
        }
    });
})();
