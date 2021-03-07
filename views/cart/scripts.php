<script>
    $('.remove-product').click(function (e) { 
        var product    = $(this).parent().parent().prev().val();
        var totalPrice = $('#grand_total').val();
        
        $.ajax({
            type: "POST",
            url: "<?= URL_LINK; ?>views/cart/ajax/remove-item.php",
            data: {
                product:product,
                totalPrice:totalPrice
            },
            success: function (response) {
                var result     = JSON.parse(response);
                var success    = result['success'];
                var message    = result['message'];
                var totalItems = result['totalItems'];
                var grandTotalFormatted = result['grandTotalFormatted'];
                var grandTotal = result['grandTotal'];

                $('.shopping-bag').attr('title',message);
                $('.bag-count').text(totalItems);
                $('.shopping-bag').tooltip('show');

                if(success == 'true'){
                    $('#totalPrice').text(grandTotalFormatted);
                    $('#grand_total').val(grandTotal);
                    $(`input[value=${product}]`).next().remove();
                }
            }
        });
    });
</script>