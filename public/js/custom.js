$(document).ready(function(){
  $("tr").click(function(){
      $(this).addClass("selected").siblings().removeClass("selected");
  });
})