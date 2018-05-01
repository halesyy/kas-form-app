/*
 * Contains all functions that the app needs to manage
 * incoming and outcoming data.
 */

window.$placer = $('#placer');
window.save_timeouts = [];
window.save_timeouts_inputs = [];

window.fn = {


    /*
     * Watches for changes in the app,
     * the session handler.
     */
    start_watchers: function() {
      $(window).on('hashchange', function(){
        window.fn.loading.change();
      });
      $(window).on('load hashchange', function(){
        let selected = (window.location.hash.substring(1))? window.location.hash.substring(1): "parents-guardians";
        $('.point').removeClass('selected');
        $('.'+selected).addClass('selected');
      });
      $(document).on('click', '.delete', function(){
        window.fn.delete( $(this).attr('data-type'), window.fn.get_parent_from_child($(this)).attr('data-id') );
      });
      $(document).on('click', '.open', function(){
        let toclose = $(this).attr('data-open');
        let $parent = window.fn.get_parent_from_child($(this));
        $parent.find(toclose).slideDown(500);
      });
      $(document).on('click', '.none', function(){
        let toclose = $(this).attr('data-close');
        let $parent = window.fn.get_parent_from_child($(this));
        $parent.find(toclose).slideUp(500);
      });
      window.fn.loading.fast();
    },

    get_parent_from_child: function(child) {
      var $parent = $(child);
      for (var i = 0; i < 10; i++) {
        $parent = $parent.parent();
        if ($parent.attr('data-type')) {
          return $parent;
        }
      }
      return false;
    },



    /*
     * Spans the #placer divider and finds any inputs that are required
     * and have no data.
     */
    validate_page_forms: function(goto) {
      var fail = false;
      $('#placer input').each(function(index, input){
        var required = $(input).attr('required');
        if (typeof required !== typeof undefined && required !== false) {
          if ($(input).val()) {} else {
            console.log('validate: required field '+$(input).attr('name')+' empty');
            alert("Missing information: "+$(input).attr('name')+" required.");
            fail = true;
          }
        }
      });
      if (fail) {} else {
        window.location.href = "#"+goto;
      }
    },

    /*
     * The save handler is a function that is called
     * with an object when it needs to manage a new "save"
     * to the parent is done.
     * This helps stop many many calls to the backend
     * by only calling once every 5 seconds to save and
     * clearing the timeout when it's done again.
     */
    save_handler: function(object) {
      var $this = $(object);
      // var $parent = window.fn.get_parent_from_child($this);

      // window.save_timeouts_inputs[$(this).attr('name')] = $(this);

      clearTimeout(window.save_timeouts[$this.attr('name')]);
      window.fn.save($this);

      // window.save_timeouts[ $(this).attr('name') ] = setTimeout(
      //   window.fn.save()
      // );


    },

    save: function(object) {
      var $this = object;
      var $parent = window.fn.get_parent_from_child($this);

      window.save_timeouts[$this.attr('name')] = setTimeout(function(){

          var id   = $parent.attr('data-id');
          var type = $parent.attr('data-type');
          var val  = $this.val();
          if (val == "on") val = $this.is(':checked');

          $.post('/api/post', {
            type: 'save',
            saveto: type,
            id:   id,
            name:  $this.attr('name'),
            value: val
          }, function(response){
            console.log(response);
          });

      }, 1000);
    },

    loading: {
      change: function() {
          let get = (window.location.hash.substring(1))? window.location.hash.substring(1): "parent-guardians";
          $.get('/api/get/'+get, function(response){
              let body = response;
              window.$placer.fadeOut(500, function(){
                window.$placer.html(body).fadeIn(600);
                $('html, body').animate({scrollTop:0}, 'slow');
              });
          });
      },
      fast: function() {
          let get = (window.location.hash.substring(1))? window.location.hash.substring(1): "parent-guardians";
          $.get('/api/get/'+get, function(response){
              let body = response;
              window.$placer.html(body);
          });
      }
    },

    new: {
      form: function(type) {
        // Type refers to Parent or Student.
        $.get('/api/get/new/'+type, function(response){
            // console.log(response);
            let json = JSON.parse(response);
            $new = $(json.forms[0].body).hide().appendTo("#"+type+"-container").fadeIn(1000);
            $('html, body').animate({
              scrollTop: $new.offset().top
            }, 'slow');


        });
      }
    },
    delete: function(type, id) {
      //type,id
      // console.log(type);
      // console.log(id);
      $.post('/api/post', {
          type: 'delete',
          objtype: type,
          id: id
      }, function(response){
          let json = JSON.parse(response);
          if (json.success == true) {
             $('div[data-id="'+json.id+'"]').fadeOut(750);
             console.log("Deleted "+json.id+" successfully");
          } else {
             console.log(response);
          }
      });
    }

}
