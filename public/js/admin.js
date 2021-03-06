(function() {
    $('div.adminBlock').on('click', '.item-ajax-delete', function (e) {
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

    $('div.adminBlock').on('click', '.item-ajax-move' ,function (e) {
        e.preventDefault();
        var item = $(this),
            url = item.attr('href');
        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {
                if (response != 0)
                    $('.tableContainer').html(response);
                else
                    alert("Couldn't move the item");
            },
            error: function (error) {
                alert('Error');
                console.log(error);
            }
        });
    });

    $('select.managing-select').on('change',function(e){
        var value = $(this).val();
        $('.toggle-field').prop( "disabled", true);
        $('.toggle-block').hide();
        $('.toggle-field').val('');

        $('.toggle-block.' + value + ' .toggle-field').removeAttr("disabled");
        $('.toggle-block.'+ value).show();
    });

})();
