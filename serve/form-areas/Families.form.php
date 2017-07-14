<div>
  <p class="note">
    Families work as groups that students fit into. If you're registering multiple children with different families,
    please make multiple and register them under different families.
  </p>
  <button onclick="javascript:ManageParentModal();" class="open-modal">Add family</button>
  <script>
    /*Function to spawn in new modal then register
    form as a POST request & not normal form, etc...*/
    function ManageParentModal() {
      window.spawnModal('Family', function(){
        window.registerForm('#FamilyForm', {type:'Family'}, function(body){
          // When form is submitted this is called back.
          alert(body);
          console.log(body);
        });
      });
    }
  </script>
</div>
