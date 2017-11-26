





console.log($('#3 #FirstName1').text() + " " + $('#3 #LastName1').text());




$('.button').click(function() {
  $(this).toggleClass('pressed');
  $('div.year-container').toggle();
});
  
$('.month').click(function() {
  $('.month').removeClass('active');
  $(this).addClass('active');
});

// $("tr").click(function(){
//   $(this).addClass("selected").siblings().removeClass("selected");
// });



