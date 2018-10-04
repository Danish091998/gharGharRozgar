

$("#myAccount").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#newJob,#addedJobs,#editProfile,#logout").css({"color":"#000","font-weight":"normal"});
});
$("#newJob").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#myAccount,#addedJobs,#editProfile,#logout").css({"color":"#000","font-weight":"normal"});
});
$("#editProfile").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#myAccount,#newJob,#addedJobs,#logout").css({"color":"#000","font-weight":"normal"});
});
$("#addedJobs").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#myAccount,#newJobs,#logout,#editProfile").css({"color":"#000","font-weight":"normal"});
});
$("#logout").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#myAccount,#newJobs,#addedJobs,#editProfile").css({"color":"#000","font-weight":"normal"});
});

