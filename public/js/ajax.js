function check_email(em) {

    var url_request = 'http://localhost/btech/2024_Sample/Ajax_check_duplicate_email.php';
    alert(em);
    alert(url_request);
    $.ajax({
        type: "POST",
        url: url_request,
        data: {
            email: em
        },
        success: function (response) {

            $('#email_error').html(response);
            $('#email').val('');
        }
    });

}