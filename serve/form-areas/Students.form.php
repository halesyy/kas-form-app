<div>
  <div>
    {{students}}
  </div>

  <button id="AddStudent">Add student</button>
  <div class="modal" id="ModalAddStudent">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Add new student</h2>
      </div>
      <div class="modal-body">
        <p>
          <form class="kasform" id="NewStudentForm">
            <input type="text" name="fname" placeholder="First name" />
            <input type="text" name="lname" placeholder="Last name" />
            <input type="submit" value="Submittion" />
          </form>
        </p>
      </div>
    </div>
  </div>
  <script>
    window.registerModal('#AddStudent', '#ModalAddStudent');
    window.registerForm('#NewStudentForm', {type:'NewStudent'}, function(body){
      alert(body);
    });
  </script>
</div>
