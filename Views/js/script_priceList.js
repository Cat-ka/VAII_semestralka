
$(function priceList() {
    $(document).ready(function () {
        $('#type').change(function () {
            var type_id = $(this).val();

            $.ajax({
                url: "../Controller/postPriceList.php",
                method: "POST",
                data: {type_id: type_id},
                success: function (data) {
                    $('#showProduct').html(data);
                }
            });
        });
    });
})

