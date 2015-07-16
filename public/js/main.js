$(document).ready(function () {
    $('.item-ajax-delete').on('click', function (e) {
        e.preventDefault();

        var item = $(this),
            deleteUrl = item.attr('href'),
            token = item.data('token');

        $.ajax({
            type: 'post',
            url: deleteUrl,
            data: {_method: 'delete', _token: token},
            success: function (response) {
                if (response == 1){
                    item.closest('tr').remove();
                    if ($('table tbody tr').length == 0)
                        $('div.empty-table-message').show();
                }
                else {
                    alert("Couldn't delete the item");
                }
            },
            error: function (error) {
                alert('Error');
                console.log(error);
            }
        });
    });

    $('.item-ajax-move').on('click', function (e) {
        e.preventDefault();
        var item = $(this),
            url = item.attr('href');

        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {
                alert(response);
                /*
                if (response == 1){
                    item.closest('tr').remove();
                    if ($('table tbody tr').length == 0)
                        $('div.empty-table-message').show();
                }
                else {
                    alert("Couldn't delete the item");
                }
               */
            },
            error: function (error) {
                alert('Error');
                console.log(error);
            }
        });
    });
});

(function() {
    $('div.work-head').on('click',function(e){
        var article = $(this).parent();
        if (article.find('img').length != 0){
            var infoBlock = article.find('div.work-info');
            infoBlock.stop().slideToggle();
        }
    });
})();

(function() {
    $('div.message-success button.close').on('click',function(e){
        var el = $(this).parent();
        el.slideUp(600, function(){
            el.remove();
        });
    });
})();