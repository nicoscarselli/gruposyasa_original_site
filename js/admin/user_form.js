$(function() {
    var $user_form = $('#user-form');

    $user_form.validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            user_type: 'required'
        }
    });
});