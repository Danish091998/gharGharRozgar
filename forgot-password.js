function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
$(".send-button").click(function(){
    var email = $('#login-username').val();
    if(!validateEmail(email)){
        alert("Please enter a valid email.");
    }
        else{
    
    $(".forgot-password-wrapper").fadeOut(function(){
        $(".thankyou-wrapper").fadeIn();
        });
    }
});
$("#resend").click(function(){
    $(".thankyou-wrapper").fadeOut(function(){
        $(".forgot-password-wrapper").fadeIn();
        });
});
