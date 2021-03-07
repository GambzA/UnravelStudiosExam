<script>
    $('.add-to-cart').click(function(e) {
        $.ajax({
            type: "POST",
            url: "<?= URL_LINK; ?>views/product/ajax/add-to-cart.php",
            data: $('#product-form').serialize(),
            success: function(response) {
                var result = JSON.parse(response);
                var message = result['message'];
                var totalItems = result['totalItems'];

                $('.shopping-bag').attr('title',message);
                $('.bag-count').text(totalItems);
                $('.shopping-bag').tooltip('show');
            }
        });
    });
</script>