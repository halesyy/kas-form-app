<div>
  <div>
    <div>
      <ol class="studentSelection NewStudentPlace">
        {{studentSelectionList}}
      </ol>
    </div>
  </div>
  <button onclick="javascript:ManageStudentModal();" class="open-modal">Add student</button>
  <button onclick="$.get('/logout/index.php', function(body){ window.location.reload(); });">Reset Session</button>
  <script>
    /*Function to spawn in new modal then register
    form as a POST request & not normal form, etc...*/
    function ManageStudentModal() {
      window.spawnModal('Student', function(){
        window.registerForm('#StudentForm', {type:'Student'}, function(body){
          // When form is submitted this is called back.
          console.log(body);
        });
      });
    }
  </script>
</div>
