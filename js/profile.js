$(document).ready(function() {
    $('#saveProfile').on('click', function() {
        var age = $('#age').val();
        var dob = $('#dob').val();
        var contact = $('#contact').val();

        
        $.ajax({
            url: 'php/profile.php', 
            method: 'POST',
            data: {
                age: age,
                dob: dob,
                contact: contact
            },
            success: function(response) {
                
                console.log('Profile updated successfully:', response);
                
            },
            error: function(xhr, status, error) {
                
                console.error('Profile update error:', error);
               
            }
        });
    });
});
