

$("#myAccount").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#appHistory,#editProfile,#logout").css({"color":"#000","font-weight":"normal"});
});
$("#appHistory").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#myAccount,#editProfile,#logout").css({"color":"#000","font-weight":"normal"});
});
$("#editProfile").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#myAccount,#appHistory,#logout").css({"color":"#000","font-weight":"normal"});
});
$("#logout").click(function(){
   $(this).css({"color":"#00aff0","font-weight":"600"});
    $("#myAccount,#appHistory,#editProfile").css({"color":"#000","font-weight":"normal"});
});