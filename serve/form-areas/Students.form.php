<div>
  <div>
    <div>
      <ol class="studentSelection NewStudentPlace">
        {{studentSelectionList}}
      </ol>
    </div>
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
            <!--First/Middle/Last Name.-->
            <div class="row">
              <h3><span>Student details</span></h3>
              @fourth {type="text", name="fname", placeholder="First name" value="First" required}
              @fourth {type="text", name="lname", placeholder="Last name" value="Middle" required}
              @fourth {type="text", name="mname", placeholder="Middle Name/s" value="Last" required}
              @fourth {type="text", name="pname", placeholder="Preferred Name" value="Prefer" required}

              @whole {type="email" name="email" placeholder="Applicant's Email" value="halesyy@gmail.com" required}
              @half {type="number" name="homephone" placeholder="Applicant's home phone" value="123123" required}
              @half {type="number" name="mobilephone" placeholder="Applicant's mobile phone" value="321321" required}

              @half {type="text" name="yeartoenrol" placeholder="Year applicant to enrol in" value="Year11/2018" required}
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <select name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>
            <input type="submit" value="Submittion" />
          </form>
        </p>
      </div>
    </div>
  </div>
  <script>
    window.registerModal('#AddStudent', '#ModalAddStudent');
    window.registerForm('#NewStudentForm', {type:'NewStudent'}, function(body){
      var jdata = JSON.parse(body);
      if (jdata.success === true) {
        $('.NewStudentPlace').append("<li>"+jdata.fullName+"</li>");
      }
    });
  </script>
</div>
