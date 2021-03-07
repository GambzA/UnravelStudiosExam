<script>
    $("#login-form").validate({
        rules: {
            emailAdress: {
                required: true,
                email: true,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "<?= URL_LINK; ?>views/login/ajax/login.php",
                data: $('#login-form').serialize(),
                success: function(response) {
                    var jsonResponse = JSON.parse(response);
                    if(jsonResponse['success'] == 'true'){
                        location.reload();
                    }
                    $('#login-message').text(jsonResponse['message']);
                }
            });
        }
    });
</script>