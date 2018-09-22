
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

        document.getElementById("avatar").addEventListener("change", readFile, false);


$('#password, #confirm_password').on('keyup', function () {
    if($('#password').val() != "" ){
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else{ 
        $('#message').html('Not Matching').css('color', 'red');
    }
    }
});
