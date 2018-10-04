//DATE PICKER

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

//SELECT QUALIFICATION

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
   
$.ajax({
            type: "POST",
            url: "functions.php",
            data: "qual2=" + qual2 + "&check=select2",
            success: function(result) {
            $("#selectThree").append(result);
            }   
        })
                        }

//PASSWORD MATCHING

$('#password, #confirm_password').on('keyup', function () {
    if($('#password').val() != "" ){
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else{ 
        $('#message').html('Not Matching').css('color', 'red');
    }
    }
});


function readFile() {
    if(this.files[0].size > 1000000){
        alert("File must be less than 1MB");
       this.value = "";
    }
    else{
          if (this.files && this.files[0]) {
            var FR= new FileReader();
            FR.onload = function(e) {
              document.getElementById("imgupload").src = e.target.result;
              document.getElementById("imgupload").style.width = "200px";

            };
            FR.readAsDataURL( this.files[0] );
          }
        }
}

   var el= document.getElementById("avatar");
if(el){
       el.addEventListener("change", readFile, false);
}
 