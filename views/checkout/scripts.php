<script>
    $('.proceed-checkout').click(function(e) {
        $.ajax({
            type: "POST",
            url: "<?= URL_LINK; ?>views/cart/ajax/validate-cart.php",
            data: {
                check: '1'
            },
            success: function(response) {
                var result = JSON.parse(response);
                var success = result['success'];
                var message = result['message'];

                if (success == 'true') {
                    // PROCEED TO PAYMENT
                    $(location).attr('href', '<?= URL_LINK; ?>checkout-process')
                } else {
                    var unavailableItems    = result['unavailableItems'];
                    $.each(unavailableItems, function (unavailableItemsKey, unavailableItemsVal) { 
                         $(`.product[value=${unavailableItemsVal}]`).next().find('.item-qty').attr('title','This item is out of stock!');
                         $(`.product[value=${unavailableItemsVal}]`).next().find('.item-warning').removeClass('d-none');
                         $(`.product[value=${unavailableItemsVal}]`).next().find('.item-qty').tooltip('show');
                    });

                    var itemsLessThanQty    = result['itemsLessThanQty'];
                    $.each(itemsLessThanQty, function (itemsLessThanQtyKey, itemsLessThanQtyVal) { 
                         $(`.product[value=${itemsLessThanQtyVal}]`).next().find('.item-qty').attr('title','Your QTY for this item is greater than the available stock!');
                         $(`.product[value=${itemsLessThanQtyVal}]`).next().find('.item-warning').removeClass('d-none');
                         $(`.product[value=${itemsLessThanQtyVal}]`).next().find('.item-qty').tooltip('show');
                    });
                    
                }

            }
        });
    });
</script>