/*
 * Contains all functions that the app needs to manage
 * incoming and outcoming data.
 */

window.$placer = $('#placer');
window.save_timeouts = [];
window.save_timeouts_inputs = [];

window.fn = {

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
        console.log('deleting...');
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

          var id = $parent.attr('data-id');
          var type = $parent.attr('data-type');

          $.post('/api/post', {
            type: 'save',
            saveto: type,
            id:   id,
            name:  $this.attr('name'),
            value: $this.val()
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
            $(json.forms[0].body).hide().appendTo("#"+type+"-container").fadeIn(1000);

        });
      }


    }

}
