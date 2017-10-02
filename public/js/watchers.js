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
  resizeModals();
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
  function Load(ToServe, direction, antidirection) {
    /*blocks re-requesting the same file again and again..*/
    if (window.currentlyLoaded === ToServe) {} else {
      //
      window.currentlyLoaded = ToServe;
      window.direction = direction;
      window.antidirection = antidirection;
      //
      $.get('/api/get/'+ToServe, function(body){
        $placer = $('#right-place');
        $placer.hide("slide", { direction: window.antidirection }, 500, function(){
          $placer.html(body).show("slide", { direction: window.direction }, 500);
          resizeModals();
        });
      });
    }
  }
  function LoadQuick(ToServe) {
    window.currentlyLoaded = ToServe;
    $.get('/api/get/'+ToServe, function(body){$('#right-place').html(body);resizeModals();});
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
  $(document).on('click', '.load', function(event){
    event.preventDefault();
      var $this = $(this);
      var ToServe = $this.attr('href');
      //sets the beginning animation to whatever the class is -- then reverses it after
      if ($this.hasClass('back')) {direction = "left"; antidirection = "right";}
      else if ($this.hasClass('fwd')) {direction = "right"; antidirection = "left";}
      else {direction = "right"; antidirection = "left";}
      //
      Load(ToServe, direction, antidirection);
        $('.load').css({'color':'black', 'font-weight':'400'});
        $('.'+ToServe).css({'color':window.ThemeColor, 'font-weight':'bold'});
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
    if ($(this).scrollTop() > $("#header").height()) {
      $left.css({"position":"fixed", "top":"10px"});
      $right.addClass('col-lg-offset-2 col-md-offset-3 col-sm-offset-4 col-xs-offset-5');
    } else {
      $left.css("position", "static");
      $right.removeClass('col-lg-offset-2 col-md-offset-3 col-sm-offset-4 col-xs-offset-5');
    }
  });



  /*
  | Window function for registering forms as watchable
  | and manageable to send POST requests to the POST API.
  */
  window.registerForm = function(access, dataObject, callback) {
    $access = $(access);
    if ($access.length === 0) console.log('NOPE! LOL XD');
    $access.submit(function(event){
      event.preventDefault();
        $.post('/api/', {
          type: dataObject.type,
          formData: $access.serializeArray()
        }, function(body){
          // alert(body);
          callback(body);
          // console.log(body);
          $('.modal').fadeOut(250, function(){
            window.location.reload();
          });
        });
      return false;
    });
  }
  /*
  | Registers modals to a button so when clicked will react
  | and load up modal.
  */
  window.registerModal = function(access, modalAccess) {
    $(document).on('click', access, function(){
      $(modalAccess).fadeIn(250);
    });
  }
  $(document).on('click', '.open-modal', function(){
    $('#DynamicModalContainer').fadeIn(250);
  });
  $(document).on('click', '.close', function(){
    $('.modal').fadeOut(250);
  });



  window.EditFamily = function() {
    window.spawnModal('Family/edit', function(){
      $('#DynamicModalContainer').fadeIn(250);
      window.registerForm('#FamilyForm', {type:'Family'}, function(body){
        console.log(body);
      });
    });
  }
  /*
  | Populates the dynamic form with the data from paramater.
  | Retrieves the file data and pushes to the dynamic body.
  */
  window.spawnModal = function(formComponent, callback) {
    $.get('/api/get/modal/'+formComponent, function(body){
      $('#DynamicModalBody').html(body);
      callback();
    });
  }
  $(document).on('click', '.edit-student', function(){
    StudentID = $(this).attr('data-student-id');
    $.get('/api/get/modal/Student/'+StudentID, function(body){
      $('#DynamicModalBody').html(body);
      $('#DynamicModalContainer').fadeIn(250, function(){
        window.registerForm('#StudentForm', {type:'Student'}, function(body){
          // When form is submitted this is called back.
          console.log(body);
        });
      });
    });
  });
  $(document).on('click', '.delete-student', function(){
    var studentid = $(this).attr('data-student-id');
    bootbox.confirm({
      message: "Are you sure you want to delete this student?",
      buttons: {
          confirm: {
              label: 'Yes',
              className: 'btn-success'
          },
          cancel: {
              label: 'No',
              className: 'btn-danger'
          }
      },
      callback: function (result) {
        if (result == true) {
          $.post('/api/', {
            type: 'DeleteStudent',
            studentid: studentid
          }, function(body){
            // alert(body);
            window.location.reload();
          });
        }
      }
    });
  });



  /*
  | Checkbox being pressed toggle, going to fadeIn whatever
  | selector done using the data-toggle="" is.
  */
  $(document).on('click', '.toggle-checkbox', function(){
    var toFade = $(this).attr('data-toggle');
    $(toFade).fadeIn(300);
  });



  /*
  | Action for when screen is resized to a small width, have
  | to do some adjustments to the modals on screen to fit more
  | content.
  */
  $(window).resize(function() {
    resizeModals();
  });
  function resizeModals() {
    if ($(window).width() < 981) {
      $('.modal-content').css({'width':'90%', 'margin-left':'5%'});
    } else {
      $('.modal-content').css({'width':'70%', 'margin-left':'15%'});
    }
  }



  /*
  | Wanting us to populate the IDs on page for calculating
  | the total student price after payment interval selected.
  | - resets all methods for selecting.
  | - disables ones that can't be clicked.
  */
  window.SetPaymentInterval = function(type) {
    //resets payment methods. - all have .paymentType
    $('.paymentType').prop("checked", false);
    window.SetPaymentMethod('false');
    // window.PaymentType = type;

    //resets all payment types then manages what type was called
    //and eliminates some payment intervals.
    // $('.paymentType').prop("disabled", false);
    // $('#repeatTillCancelled').prop("disabled", false);
    // if (type == 'fortnightly') {
    //   $('#PT_Cash').prop("disabled", true);
    //   $('#repeatTillCancelled').prop("disabled", true);
    //   if ($('#repeatTillCancelled').is(':checked')) {} else {
    //     $('#repeatTillCancelled').click();
    //   }
    // } else if (type == 'termly' || type == 'annually') {
    //   $('#PT_Centrelink').prop("disabled", true);
    // }


    //sending AJAX off to change the payment interval.
    $.post('/api/', {
      type: 'ChangePaymentInterval',
      //familyMember: familyMember,
      interval: type
    }, function(body){
      //alert(body);
    });
  }


  /*
  | setting payment.
  */
  window.SetPaymentMethod = function(familyMember, type) {
    window.familyMember = familyMember;
    $.post('/api/', {
      type: 'ChangePaymentMethod',
      familyMember: familyMember,
      method: type
    }, function(body){
      // alert(body);
    });
    $.get('/api/get/form.'+type+'/'+familyMember, function(body){
      // console.log(body+" "+'.'+window.familyMember+'-payment-details');
      window.tbody = body;
      $('.'+window.familyMember+'-payment-details > div').slideUp(250, function(){
        $('.'+window.familyMember+'-payment-details > div').html(window.tbody).slideDown(250);
      });
    });
  }





  /*
  |
  */
  window.SetRepeatCancel = function(familyMember) {
    if ($('.repeatTillCancelled-'+familyMember).is(':checked'))
      $('.AutomaticIncreaseContainer-'+familyMember).fadeIn(250);
    else {
      $('.AutomaticIncreaseContainer-'+familyMember).fadeOut(250);
      $('.allowAutomaticIncreases-'+familyMember).prop("checked", false);
    }

    $.post('/api/', {
      type:   'ChangeRepeatCancel',
      action: $('.repeatTillCancelled-'+familyMember).is(':checked'),
      familyMember: familyMember
    }, function(body){
      // alert(body);
      // window.location.reload();
    });
  }
  window.SetAutomaticIncreases = function(familyMember) {
    $.post('/api/', {
      type: 'ChangeAutomaticIncreases',
      action: $('.allowAutomaticIncreases-'+familyMember).is(':checked'),
      familyMember: familyMember
    }, function(body){
      // alert(body);
      // window.location.reload();
    });
  }

  // set if the family member will be paying at all
  window.SetResponsibility = function(FamilyMember, ToggledObject) {
    $.post('/api/', {
      type: 'ChangeFamilyResponsibility',
      familyMember: FamilyMember,
      is: $(ToggledObject).is(':checked')
    }, function(body){
      console.log(body);
    });

    //doing a toggle on one of the percentage fillouts to
    //make sure that there's the warning for newly added
    //people that there's not a 100 percentage present.
    window.CheckPercentageTotal();

    //once done, unlock the "percentage" area for the parent
    //just made responsible.
    if ($(ToggledObject).is(':checked')) {
      $('.'+FamilyMember+'-splitting-payment').slideDown(250);
    } else {
      $('.'+FamilyMember+'-splitting-payment').slideUp(250);
    }
  }


  /*
  | Nice fat function to pipe data into the Family
  | object's field of MethodOfPaymentDetails.
  */
  window.UpdateMethodOfPaymentDetails = function(familyMember, paymentMethod, fieldName, fieldValue) {
    $.post('/api/', {
      type: 'UpdateMethodOfPaymentDetails',
      familyMember: familyMember,
      paymentMethod: paymentMethod,
      fieldName: fieldName,
      fieldValue: fieldValue
    }, function(body){
      console.log(body);
    });
  }

  window.OtherPayingForFeesManage = function(ToggledObject) {
    if ($(ToggledObject).is(':checked')) {
      //ticked.
      $('#OtherGuardianCapture').fadeIn(250);
    } else {
      //unticked.
      $('#OtherGuardianCapture').fadeOut(250);
    }
  }

  window.OtherInputsUpdate = function(ToggledObject) {
    var Name  = $(ToggledObject).attr('name');
    var Value = $(ToggledObject).val();
    $.post('/api/', {
      type: 'OtherInputsUpdate',
      name: Name,
      value: Value
    }, function(body){
      // alert(body);
    });
  }

  //updating how much a family member contributes to the fee payment.
  window.UpdateFamilyMemberPercentage = function(FamilyMember, ToggledObject) {
    $.post('/api/', {
      type: 'UpdateFamilyMemberPercentage',
      familyMember: FamilyMember,
      percentage: $(ToggledObject).val()
    }, function(body){
      console.log(body);
      window.CheckPercentageTotal();
    });
  }
  //will display that all percentages don't equate to 100.
  window.CheckPercentageTotal = function() {
    $.post('/api/', {
      type: 'CheckPercentageTotal'
    }, function(body){
      var tbody = JSON.parse(body);
      console.log(tbody);
      $errorRead = $('#returnCombinationErrorMessage');
      if (tbody.total100 == true) $errorRead.slideUp(250);
      else $errorRead.slideDown(250);
    });
  }


  /*
  | "SUPERUSER" changing of some form elements being disabled overide.
  */
  shortcut.add('Ctrl+K', function(){
    $('.master_unlock').prop("disabled", false);
  });

  $(document).on('click', '#yearLevel', function(){
    // alert('to check!');
  });



});
