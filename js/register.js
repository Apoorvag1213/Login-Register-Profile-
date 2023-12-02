$(document).ready(function() {
  $('#registerBtn').click(function() {
    // Retrieve input field values
    var fullname = $('#fullname').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var password = $('#password').val();

    // AJAX POST request
    $.ajax({
      url: 'php/register.php', // Replace with the actual path to your PHP backend script
      method: 'POST',
      data: {
        fullname: fullname,
        username: username,
        email: email,
        password: password
      },
      success: function(response) {
        
        console.log('Registration successful:', response);
        
        window.location.href = 'login.html'; 
      },
      error: function(xhr, status, error) {
       
        console.error('Registration error:', error);
        
      }
    });
  });
});
