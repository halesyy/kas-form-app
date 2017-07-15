<div>
  <p class="note">
    Families work as groups that students are part of. If you're registering multiple children with different families,
    please make multiple and register them under different families. ALSO Please finish adding all students wanting to be
    registered before adding families. :)
  </p>
  <div>
    <?php
      foreach ($_SESSION['form']['families'] as $index => $Family):
        $Family = unserialize($Family);
        $Family->Preview();
      endforeach;
    ?>
  </div>
  <button onclick="javascript:ManageParentModal();" class="open-modal">Add family</button>
  <button onclick="$.get('/logout/family.php', function(body){ window.location.reload(); });" class="open-modal">Reset families and students as not-assigned families</button>
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
