<h3><span>Students</span></h3>
<div>
  <div>
    <div>
      <ol class="studentSelection NewStudentPlace">
        {{studentSelectionList}}
      </ol>
    </div>
  </div>
  <div class="next-selector">
    <div class="left">
      <button onclick="javascript:ManageStudentModal();" class="btn btn-primary open-modal">Add Student</button>
    </div>
    <div class="right">
      <a href="enrolment-information" class="load back btn btn-primary btn-left">Back</a><a href="family-details" class="load fwd btn btn-primary btn-right">Next</a>
    </div>
    <div class="clear"></div>
  </div>
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
