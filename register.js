$( function() {
    $( "#datepicker,#datepickerProfile" ).datepicker({changeYear:true,
                                   yearRange:'-60:',
                                  dateFormat:'yy-mm-dd',
                                  maxDate: "-14y" });
  } );
$(".js-example-placeholder-single").select2({
    placeholder: "Select Your Qualification",
    allowClear: false   
});

function checkSelect(){
    $("#selectTwo").children("option").remove();
    $("#selectTwo").append("<option></option>");
    $("#selectDiv2").css("visibility", "visible");
    var qual = $('.js-example-placeholder-single').val();
   
$.ajax({
            type: "POST",
            url: "functions.php",
            data: "qual=" + qual + "&check=select1",
            success: function(result) {
            $("#selectTwo").append(result);
            }   
        })
                        }
function checkSelect2(){
    $("#selectThree").children("option").remove();
    $("#selectThree").append("<option></option>");
    $("#selectDiv3").css("visibility", "visible");
    var qual2 = $('.valuePick').val();
    console.log(qual2);
   
$.ajax({
            type: "POST",
            url: "functions.php",
            data: "qual2=" + qual2 + "&check=select2",
            success: function(result) {
            $("#selectThree").append(result);
            }   
        })
                        }
$('#password, #confirm_password').on('keyup', function () {
    if($('#password').val() != "" ){
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else{ 
        $('#message').html('Not Matching').css('color', 'red');
    }
    }
});

 $("#editProfile").click(function(){
    $('#show').load("editprofile.php" +  '#show');
        });
