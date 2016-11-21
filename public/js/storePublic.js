$(document).ready(function(){
  $('#game').on('change', function() {
    $.ajax({
      url: "/get/teams/"+$(this).val(),
      cache: false,
      success: function(html){
        $("#teamholder").empty().append(html);
      }
    });
  });


  //teamholder
  $("#submitbutton").click(function(){
      $("form#registerpublicform").submit();
  });
});
