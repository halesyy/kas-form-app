$(document).ready(function(){

  /*
  | ASAPLoading the change, then setting an event handler
  | to keep the constant user experience. Users won't be
  | resizing their screen the second the app loads so it's
  | okay to ASAPLoad then set handler.
  */
  $('#left, #right').height($(window).height() - $('#header').height());
  $(window).on('resize', function(){
    $('#left, #right').height($(window).height() - $('#header').height());
  });

});
