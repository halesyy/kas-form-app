<h3><span>Family Details</span></h3>
<div>
  <!-- <p class="note curved">
    Make sure you have all students under family before commencing to finalizing your family.
  </p> -->
  <div>
    <?php
      if (isset($_SESSION['form']['families'])) foreach ($_SESSION['form']['families'] as $index => $Family):
        $Family = unserialize($Family);
        $Family->PreviewBeta();
      endforeach;
    ?>
  </div>
  <div class="next-selector" style="margin-top: 10px;/*5px more than default*/">
    <div class="left">
      <?php if (count($_SESSION['form']['families']) == 0): ?>
        <button onclick="javascript:ManageParentModal();" class="open-modal btn btn-primary">Add family</button>
      <?php else: ?>
        <button onclick="window.EditFamily();" class="btn btn-primary">Edit Family</button>
      <?php endif; ?>
    </div>
    <div class="right">
      <button href="students" class="load back btn btn-primary btn-left">Back</button><button href="fee-information" class="load fwd btn btn-primary btn-right">Next</button>
    </div>
    <div class="clear"></div>
  </div>
  <script>
    /*Function to spawn in new modal then register
    form as a POST request & not normal form, etc...*/
    function ManageParentModal() {
      window.spawnModal('Family', function(){
        window.registerForm('#FamilyForm', {type:'Family'}, function(body){
          // When form is submitted this is called back.
          // alert(body);
          console.log(body);
        });
      });
    }
  </script>
</div>
