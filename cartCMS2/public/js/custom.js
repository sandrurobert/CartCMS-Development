/*$(document).ready(function(){

    $('.submit').click(function(){
        var id = $(this).attr('id');

        if(id == 'submit-login'){
            var username = $('.username-login').val();
            var password = $('.password-login').val();

            sendLoginData(username, password);

        }

    });


    function sendLoginData(username, password){
        var base_url = 'http://127.1.0.0/cartCMS2/public/';
        $.ajax({
            url: base_url+'user/login',
            type: 'POST',
            data: {username: username, password: password},
            dataType: 'json',
            success: function(data){
                alert(data[0]);
            },
            error: function(data){
                alert('error');
            }
        });
    }
});
*/