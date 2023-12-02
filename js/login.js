$(document).ready(function () {
    $('#loginBtn').click(function () {
        const username = $('#username').val();
        const password = $('#password').val();

        
        $.ajax({
            url: 'php/login.php',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function (data) {
                if (data && data.success) {
                    
                    window.location.href = 'profile.html';
                } else {
                    
                    $('#error-message').text('Invalid username or password. Please try again.');
                }
            },
            error: function () {
                
                $('#error-message').text('Login request failed. Please try again later.');
            }
        });
    });
});
