<script>
    $("#signup-form").validate({
        rules: {
            firstName: {
                required: true,
                maxlength: 50
            },
            lastName: {
                required: true,
                maxlength: 50
            },
            emailAdress: {
                required: true,
                email: true,
                maxlength: 50
            },
            contactNumber: {
                required: true,
                maxlength: 50
            },
            completeAddress: {
                required: true,
                maxlength: 200
            },
            password: {
                required: true,
                minlength: 5
            },
            password_confirm: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: "<?= URL_LINK; ?>views/signup/ajax/signup.php",
                data: $('#signup-form').serialize(),
                success: function(response) {
                    var jsonResponse = JSON.parse(response);
                    if(jsonResponse['success'] == 'true'){
                        $('#signup-form').trigger("reset");
                    }
                    $('#signup-message').text(jsonResponse['message']);
                }
            });
        }
    });
</script>