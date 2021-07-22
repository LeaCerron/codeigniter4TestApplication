$('.needs-validation').on('submit', function(event) {
    form = $(this);
    form.addClass('was-validated')

    if (form.attr('id') == "Register") {
        register();
    } else if (form.attr('id') == "Login") {
        login();
    } else {
        resetUserPassword()
    }

    if (!this.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
    }
})

function login() {
    $.post("/LoginController/loginUser", {
        email: $('#email').val(),
        password: $('#password').val(),
    }, function(data) {
        if (data.status != 'Success') {
            $('#email').get(0).setCustomValidity(data.error);
            $('.email').html('');
            $('#password').get(0).setCustomValidity(data.error);
            $('.password').html(data.error);
        } else {
            $('#password').get(0).setCustomValidity('');
            $('#email').get(0).setCustomValidity('');
            location.href = '/Home';
        }
    }, 'json');
}

function register() {
    $.post("/LoginController/registerUser", {
        email: $('#email').val(),
        name: $('#name').val(),
        password1: $('#password1').val(),
        password2: $('#password2').val()
    }, function(data) {
        if (data.status != 'Success') {
            for (i in data.errors) {
                $('#' + i.toLowerCase()).get(0).setCustomValidity(data.errors[i]);
                $('.' + i.toLowerCase()).html(data.errors[i]);
            }
        } else {
            $('#password1').get(0).setCustomValidity('');
            $('#password2').get(0).setCustomValidity('');
            $('#name').get(0).setCustomValidity('');
            $('#email').get(0).setCustomValidity('');
        }
    }, 'json');
}

function resetUserPassword() {
    $.post("/LoginController/resetUserPassword", {
        password1: $('#password1').val(),
        password2: $('#password2').val(),
        email: email
    }, function(data) {
        if (data.status != 'Success') {
            for (i in data.errors) {
                $('#' + i.toLowerCase()).get(0).setCustomValidity(data.errors[i]);
                $('.' + i.toLowerCase()).html(data.errors[i]);
            }
        } else {
            $('#password1').get(0).setCustomValidity('');
            $('#password2').get(0).setCustomValidity('');
        }
    }, 'json');
}

function sendResetPasswordEmail() {
    $.post("/LoginController/sendResetPasswordEmail", {
        email: $('#passwordResetEmail').val()
    }, function(data) {
        if (data.status == 'Success') {
            $('#EmailResetGoodFeedback').addClass('d-block');
            $('#EmailResetBadFeedback').removeClass('d-block');
        } else {
            $('#EmailResetBadFeedback').html(data.error);
            $('#EmailResetBadFeedback').addClass('d-block');
            $('#EmailResetGoodFeedback').removeClass('d-block');
        }
    }, 'json')
}