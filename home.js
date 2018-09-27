
$(".login-button").click(function(e){
e.preventDefault();
var myModal = $('#modalForSelection');
myModal.find('.modal-body').html();
    myModal.modal('show');
});

$("#job-seeker-login,#loginForSeeker").click(function(e){
e.preventDefault();
var myModal = $('#modalForLogin');
myModal.find('.modal-body').html();
    myModal.modal('show');
});

$("#job-provider-login-button,#loginForProvider").click(function(e){
e.preventDefault();
var myModal = $('#modalForLoginProvider');
myModal.find('.modal-body').html();
    myModal.modal('show');
});


$(".signup-button").click(function(e){
e.preventDefault();
var myModal = $('#modalForSelectionRegister');
myModal.find('.modal-body').html();
    myModal.modal('show');
});

$("#job-seeker-register-button,#registerForSeeker").click(function(){
    window.location = 'register.php';
});

$("#job-provider-register-button,#registerForProvider").click(function(){
    window.location = 'registerCompany.php';
});

$("#logout-button").click(function(){

$.ajax({
            type: "POST",
            url: "logout.php",
            });
    });

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");    
    $("i").toggleClass("up");
    $(".dropbtn").toggleClass("color");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
          $("i").toggleClass("up");
          $(".dropbtn").toggleClass("color");
      }
    }
  }
}


  $('.anchor1').hover(function() {
    $('.tip-top-left').css('border-right', '18px solid #007caa');
  }, function() {
    // on mouseout, reset the background colour
    $('.tip-top-left').css('border-right', '18px solid #00aff0');
  });
$('.anchor2').hover(function() {
    $('.tip-top-right').css('border-left', '18px solid #bf3300');
  }, function() {
    // on mouseout, reset the background colour
    $('.tip-top-right').css('border-left', '18px solid #f04100');
  });