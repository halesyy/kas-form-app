window.ThemeColor = '#003F80';
/*
| WHY IS THE MAIN AND WATCHER FILE TOGETHER JACK?
| I'm obsessed with performance and since my audit score
| was a bit high for performance, I'm cutting down requests
| till I can get a manageable score for 3G networks.
| Combining the Main.JS and Watchers.js file is a good
| move.
*/
$(document).ready(function(){
  /*
  | Function to initialize the first load of the application
  | being ran, so first load to the server.
  | If nothing is given from the Hash in the URL will simply
  | load the default file which is enrolment-information.
  */
  function FirstLoad() {
    var Hash = window.location.hash;
    if (Hash.length <= 1) {
      LoadQuick('enrolment-information');
      $('.enrolment-information')
      .css({'color':window.ThemeColor, 'font-weight':'bold'});
    } else {
      LoadQuick(window.location.hash.replace('#', ''));
      $('.'+window.location.hash.replace('#', '').replace('/','-'))
      .css({'color':window.ThemeColor, 'font-weight':'bold'});
    }
  }

  /*
  | Loads the given ToServe (form file to get) by requesting
  | to the API which exact serve to find. Serve is then given
  | a response in HTML format to supply to the #right > div.
  */
  function Load(ToServe) {
    /*blocks re-requesting the same file again and again..*/
    if (window.currentlyLoaded === ToServe) {} else {
      window.currentlyLoaded = ToServe;
      $.get('api/get/'+ToServe, function(body){
        $placer = $('#right > div');
        $placer.hide("slide", { direction: "left" }, 500, function(){
          $placer.html(body).show("slide", { direction: "right" }, 500);
        });
      });
    }
  }
  function LoadQuick(ToServe) {
    window.currentlyLoaded = ToServe;
    $.get('api/get/'+ToServe, function(body){$('#right > div').html(body);});
  }

  FirstLoad(); //#Let's go first load!
  /*
  | When any link (left link area) is clicked, this event
  | is triggered and manages the the call.
  | Will prevent the URL from redirecting to the actual
  | location since it's programmed to use the href="x" as
  | the serve GET.
  | Also sets the color of the link to simulate the color
  | getting chosen.
  */
  $('.load').click(function(event){
    event.preventDefault();
      var $this = $(this);
      var ToServe = $this.attr('href');
      Load(ToServe);
        $('.load').css({'color':'black', 'font-weight':'400'});
        $this.css({'color':window.ThemeColor, 'font-weight':'bold'});
      window.location.href = "#"+ToServe;
    return false;
  });

  // ALL OF MAIN-RELATED FUNCTIONS. NOT WATCHING.
  /*
  | ASAPLoading the change, then setting an event handler
  | to keep the constant user experience. Users won't be
  | resizing their screen the second the app loads so it's
  | okay to ASAPLoad then set handler.
  */
  var Height = $(window).height() - $('#header').height();
  $('#left, #right').css({'min-height':Height});
  $(window).on('resize', function(){
    var Height = $(window).height() - $('#header').height();
    $('#left, #right').css({'min-height':Height});
  });

  /*
  | AWESOME FEATURE:
  | Will set the left bar to fix itself at a certain height
  | after scrolling a certain distance past the header.
  */
  var $left = $('#left'), $right = $('#right');
  $(document).scroll(function(event) {
      if($(this).scrollTop() > $("#header").height()) {
          $left.css({"position":"fixed", "top":"10px"});
          $right.addClass('col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5');
      } else {
          $left.css("position", "static");
          $right.removeClass('col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5');
      }
  });



  /*
  | Window function for registering forms as watchable
  | and manageable to send POST requests to the POST API.
  */
  window.registerForm = function(access, dataObject, callback) {
    $access = $(access);
    $access.submit(function(event){
      event.preventDefault();

        $.post('/api/', {
          type: dataObject.type,
          formData: $access.serializeArray()
        }, function(body){
          callback(body);
        });

      return false;
    });
  }
  /*
  | Registers modals to a button so when clicked will react
  | and load up modal.
  */
  window.registerModal = function(access, modalAccess) {
    $(access).click(function(){
      $(modalAccess).fadeIn(250);
    });
  }
  $(document).on('click', '.close', function(){
    $('.modal').fadeOut(250);
  });










});
