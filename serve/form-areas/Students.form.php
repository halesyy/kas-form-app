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
            <!-- First/Middle/Last Name. -->
            <h3>
              <span>Student Details</span>
            </h3>
            <div class="row">
              @fourth
                [label "First name*" for "fname"]
                <input type="text" id="fname" name="fname" placeholder="First name" value="First" required />
              @fourth-connection
                [label "Last name*" for "lname"]
                <input type="text" id="lname" name="lname" placeholder="Last name" value="Last" required />
              @fourth-connection
                [label "Middle name" for "mname"]
                <input type="text" id="mname" name="mname" placeholder="Middle Name/s" value="Middle" />
              @fourth-connection
                [label "Preffered name" for "pname"]
                <input type="text" id="pname" name="pname" placeholder="Preferred Name" value="Prefer" />
              @//
            </div> <!--./row for first|last|middle|prefered name-->
            <div class="row">
              @fourth
                [label "Year to enrol*" for "yearToEnrol"]
                <select id="yearToEnrol" name="yearToEnrol">
                  @yeartoenrol
                </select>
              @fourth-connection
                [label "Year level*" for "yearLevel"]
                <select id="yearLevel" name="yearLevel">
                  @yearlevel
                </select>
              @fourth-connection
                [label "Student Gender*" for "gender"]
                <select id="gender" name="gender">
                  @gender
                </select>
              @fourth-connection
                [label "Student Birth Country*" for "countries"]
                <select id="countries" name="countries">
                  @countries
                </select>
              @//
            </div>
            <div class="row">
              @whole
                <p class="field-label">Is the student:</p>
                <div class="field">
                  <div class="fields">
                    <input type="checkbox" name="isAboriginal" value="true" /> <span class="space">Aboriginal?</span>
                    <input type="checkbox" name="isTorresStraitIs" value="true" /> <span>Torres Strait Is?</span>
                  </div>
                </div>
              @whole-connection
                [label "Birth date" for "dateOfBirth"]
                <input type="date" id="dateOfBirth" name="dateOfBirth" min="2000-00-00" placeholder="Date of Birth" required />
              @half-connection
                [label "Student's nationality*" for "nationality"]
                <input type="text" id="nationality" name="nationality" placeholder="Nationality" value="Australian" required />
              @half-connection
                [label "Language spoken at home*" for "languageAtHome"]
                <input type="text" id="languageAtHome" name="languageAtHome" placeholder="Language" value="Australian" required />
              @//
            </div>
            <div class="row">
              @fourth
                [label "Address" for "address"]
                <input type="text" name="address" id="address" placeholder="Address" value="7 Ferry St" />
              @fourth-connection
                [label "Address" for "address"]
                <input type="text" name="town" id="town" placeholder="Town" value="Kempsey" />
              @fourth-connection
                [label "Address" for "address"]
                <input type="text" name="state" id="state" placeholder="State" value="State" />
              @fourth-connection
                [label "Address" for "address"]
                <input type="text" name="postCode" id="postCode" placeholder="Postcode" value="2440" />
              @half-connection
                [label "Lives with" for "livesWith"]
                <input type="text" name="livesWith" id="livesWith" placeholder="Lives with" value="Mom" />
              @half-connection
                [label "Religion" for "religion"]
                <input type="text" name="religion" id="religion" placeholder="Religion" value="Cosmologist" />
              @//
            </div>
            <!-- Split ed. inf & behaviour into two cols. -->
            <div class="row">
              <h3 class="next">
                <span>Educational Information</span>
              </h3>
              @half
                <p class="field-label">Has the student ever been:</p>
                <div class="field">
                  <div class="fields">
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="expelled" /> Expelled <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="suspended" /> Suspended <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="refused" /> Refused admission to a school? <br />
                  </div>
                </div>
              @half-connection
                [label "Previous school" for "previousSchool"]
                <input type="text" id="previousSchool" name="previousSchool" placeholder="Previous school" value="East Kempsey Public School" required />
              @whole-connection
                <textarea id="pleaseExplainEducation" style="display: none;" placeholder="Please explain"></textarea>
              @//
            </div><!--./edu info row-->

            <div class="row">
              <h3 class="next">
                <span>Behavioural Information</span>
              </h3>
              @whole
                <p class="field-label">Has the student ever:</p>
                <div class="field">
                  <div class="fields">
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="hasDisciplineIssues" /> Had discipline issues? <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="hasBeenArrested" /> Been arrested? <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="usedAlcoholOrTobacco" /> Used alcohol or tobacco? <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="usedIllegalDrugs" /> Used illegal drugs of any kind? <br />
                  </div>
                </div>
              @whole-connection
                <textarea id="pleaseExplainBehaviour" name="pleaseExplainBehaviour" style="display: none;" placeholder="Please explain"></textarea>
              @//
            </div><!--./behaviour info row-->
            <!-- The students Character Reference. -->
            <div class="row">
              <h3 class="next">
                <span>Character Reference</span>
              </h3>
              @third
                [label "Name *" for "creferenceName"]
                <input type="text" id="creferenceName" name="creferenceName" placeholder="Name" value="Name" required />
              @third-connection
                [label "Occupation *" for "creferenceOccupation"]
                <input type="text" id="creferenceOccupation" name="creferenceOccupation" placeholder="Occupation" value="Occupation" required />
              @third-connection
                [label "Telephone *" for "creferenceTelephone"]
                <input type="text" id="creferenceTelephone" name="creferenceTelephone" placeholder="Telephone" value="Telephone" required />
              @//
            </div>
            <!-- Medical information, Doc/Health Fund Info, Medical Information, Medical Conditions. -->
            <div class="row">
              @third-expands
                <h3 class="next">
                  <span>Doctor/Health Fund</span>
                </h3>
                <div class="field">
                  <p>Private ambulance</p>
                  <div class="fields">
                    <input type="radio" class="toggle-checkbox" data-toggle="#pleaseExplainPrivateHealth" name="privateAmbulance" value="true" /> Yes <br />
                    <input type="radio" name="privateAmbulance" value="false" /> No <br />
                  </div>
                </div>
                <div class="field">
                  <p>Private health fund</p>
                  <div class="fields">
                    <input type="radio" class="toggle-checkbox" data-toggle="#pleaseExplainPrivateHealth" name="privateHealthFund" value="true" /> Yes <br />
                    <input type="radio" name="privateHealthFund" value="false" /> No <br />
                  </div>
                </div>
                <textarea id="pleaseExplainPrivateHealth" style="display: none;" placeholder="Company and Member #"></textarea>
                <div class="spacer"></div>
                [label "Medicare Number" for "medicareNumber"]
                <input type="text" id="medicareNumber" name="medicareNumber" placeholder="Medicare Number" value="Medicare #" required />
                [label "Medicare Expiry Date" for "medicareExpiry"]
                <input type="text" id="medicareExpiry" name="medicareExpiry" placeholder="Medicare Expiry" value="Medicare Expiry" required />
                [label "Medicare Position" for "medicarePosition"]
                <input type="text" id="medicarePosition" name="medicarePosition" placeholder="Position on Card" value="Position on Card" required />
              <!--end of doctor and health fund information-->
              @third-expands-connection
                <h3 class="next">
                  <span>Medical Information</span>
                </h3>
                [label "Doctors Name" for "doctorName"]
                <input type="text" id="doctorName" name="doctorName" placeholder="Doctors Name" value="Doc Name" required />
                [label "Doctors Phone" for "doctorPhone"]
                <input type="text" id="doctorPhone" class="bottom" name="doctorPhone" placeholder="Doctors Phone" value="Doc Phone" required />
                <div class="field">
                  <p>Is the student immunised?</p>
                  <div class="fields">
                    <input type="radio" name="immunised" value="true" /> Yes <br />
                    <input type="radio" name="immunised" value="false" /> No <br />
                  </div>
                </div>
                <div class="field">
                  <p>Does student wear:</p>
                  <div class="fields">
                    <input type="checkbox" name="wearsGlasses" value="true" /> Glasses </br />
                    <input type="checkbox" name="wearsContacts" value="true" /> Contacts <br />
                  </div>
                </div>
              <!--end of medical information-->
              @third-expands-end-connection
                <h3 class="next">
                  <span>Medical Conditions</span>
                </h3>
                <div class="field">
                  <div class="fields">
                    <p>Does the student suffer from:</p>
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAsthma" value="true" /> Asthma <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasADHD" value="true" /> ADHD <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasDiabetes" value="true" /> Diabetes <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasEpilepsey" value="true" /> Epilepsey <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAutism" value="true" /> Autism <br />
                    <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAllergies" value="true" /> Allergies <br />
                  </div>
                </div>
                <textarea id="pleaseExplainCondition" style="display: none;" placeholder="Please explain"></textarea>
                <div class="field">
                  <p>Has the student recieved early intervention?</p>
                  <div class="fields">
                    <input type="radio" name="earlyIntervention" value="true" /> Yes <br />
                    <input type="radio" name="earlyIntervention" value="false" /> No <br />
                  </div>
                </div>
              <!--end of medical conditions-->
              @//
            </div><!--./medical info row-->
            <!-- Emergency Contact Information -->
            <div class="row">
              @half
                <div class="row">
                  <h3 class="next">
                    <span>Emergency Contact Information #1</span>
                  </h3>
                  [label "Name 1*" for "emergencyName1"]
                  <input type="text" id="emergencyName1" name="emergencyName1" placeholder="Name 1" value="Name of ECONTACT 1" />
                  [label "Phone*" for "emergencyPhone1"]
                  <input type="text" id="emergencyPhone1" name="emergencyPhone1" placeholder="Phone 1" value="Phone of ECONTACT 1" />
                  [label "Relationship to Student*" for "emergencyRelationship1"]
                  <input type="text" id="emergencyRelationship1" name="emergencyRelationship1" placeholder="Relationship to Student" value="Relationship of ECONTACT 1" />
                </div>
              @half-connection
                <div class="row">
                  <h3 class="next">
                    <span>Emergency Contact Information #2</span>
                  </h3>
                  [label "Name 2*" for "emergencyName2"]
                  <input type="text" id="emergencyName2" name="emergencyName2" placeholder="Name 2" value="Name of ECONTACT 2" />
                  [label "Phone*" for "emergencyPhone2"]
                  <input type="text" id="emergencyPhone2" name="emergencyPhone2" placeholder="Phone 2" value="Phone of ECONTACT 2" />
                  [label "Relationship to Student*" for "emergencyRelationship2"]
                  <input type="text" id="emergencyRelationship2" name="emergencyRelationship2" placeholder="Relationship to Student" value="Relationship of ECONTACT 2" />
                </div>
              @//
            </div><!--./emergency contact info row-->
            <input type="submit" value="Submittion" style="margin-top: 10px;" />
          </form><!--./end of entire form-->
        </p>
      </div><!--./end of modal body-->
    </div>
  </div>
  <script>
    window.registerModal('#AddStudent', '#ModalAddStudent');
    window.registerForm('#NewStudentForm', {type:'NewStudent'}, function(body){
      // if (jdata.success === true) {
      //   $('.NewStudentPlace').append("<li>"+jdata.fullName+"</li>");
      // }
      console.log(body);
    });
  </script>
</div>
