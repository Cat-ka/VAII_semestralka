

$(function () {

    $('.form').on('submit', function (e) {
        e.preventDefault();

        $form = $(this);

        submitForm($form);
    });
})

function submitForm($form) {

    $footer = $form.parent('.modal-body').next('.modal-footer');

    $footer.html('<img src="ajax-loader.gif">');
    $footer.html("O chíľu budete presmerovaný na hlavnú stránku.");

    $.ajax({
        url: $form.attr('action'),
        method: $form.attr('method'),
        data: $form.serialize(),
        success: function (response) {
            response = $.parseJSON(response);
            if (response.success) {
                if (!response.signout) {
                    setTimeout(function () {
                        $footer.html(response.message);
                        window.location = response.url;
                    }, 1000);
                }
                $footer.html(response.message);
            } else if (response.error) {
                $footer.html(response.message);
            }
            console.log(response)
        }
    });
}