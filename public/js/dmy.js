$('.button').click(function() {
  $(this).toggleClass('pressed');
  $('div.year-container').toggle();
});
  
$('.month').click(function() {
  $('.month').removeClass('active');
  $(this).addClass('active');
});