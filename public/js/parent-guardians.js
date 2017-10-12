/*
 *
 */

  $(window).on('load', function(){

      $.get('/api/get/parent-guardians-fillout', function(response){
          var json = JSON.parse(response);
          // console.log(response);

          if (json.success == true) {
            for (var i = 0; i < json.forms.length; i++) {
              //
              // console.log(json.forms[i]);
              $('#parent-guardian-container').append(
                json.forms[i].body
              );
            }
          }
      });

  });

  $(document).on('keyup', '#first-name,#middle-name,#last-name', function(event){
    let id = $(this).attr('id');
    let $parent = window.fn.get_parent_from_child($(this));
    $parent.find('#'+id+'-title').html($(this).val());
  });
