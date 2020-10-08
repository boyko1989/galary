$(document).ready(function () {

    $('.gallery').on('click', 'a.nav-link', function (e) {
        e.preventDefault();
        var page = $(this).data('page');
        $.ajax({
            url: 'pagination_ajax.php',
            type: 'GET',
            data: { page: page },
            success: function (res) {
                $('.gallery').empty();
                $('.gallery').hide().fadeIn(500).html(res);
            },
            error: function () {
                alert('Error');
            }
        });
    });

});