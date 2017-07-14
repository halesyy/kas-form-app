<div class="modal-header">
  <span class="close">&times;</span>
  <h2>Add new student</h2>
</div>
<div class="modal-body">
  <form class="kasform" id="StudentForm">
    <input type="hidden" name="studentid" value="{{{StudentID}}}" />
    <!-- First/Middle/Last Name. -->
    <h3><span>Student Details</span></h3>
    <div class="row">
      @fourth
        [label "First name*" for "fname"]
        <input type="text" id="fname" name="fname" placeholder="First name" value="{{{Personal.fname}}}" required />
      @fourth-connection
        [label "Last name*" for "lname"]
        <input type="text" id="lname" name="lname" placeholder="Last name" value="{{{Personal.lname}}}" required />
      @fourth-connection
        [label "Middle name" for "mname"]
        <input type="text" id="mname" name="mname" placeholder="Middle Name/s" value="{{{Personal.mname}}}" />
      @fourth-connection
        [label "Preffered name" for "pname"]
        <input type="text" id="pname" name="pname" placeholder="Preferred Name" value="{{{Personal.pname}}}" />
      @//
    </div> <!--./row for first|last|middle|prefered name-->
    <div class="row">
      @third
        [label "Year to enrol*" for "yearToEnrol"]
        <select id="yearToEnrol" name="yearToEnrol">
          @yeartoenrol
        </select>
      @third-connection
        [label "Year level*" for "yearLevel"]
        <select id="yearLevel" name="yearLevel">
          @yearlevel
        </select>
      @third-connection
        [label "Student Gender*" for "gender"]
        <select id="gender" name="gender">
          @gender
        </select>
      @//
    </div>
    <div class="row">
      @whole
        <p class="field-label">Is the student:</p>
        <div class="field">
          <div class="fields">
            <input type="checkbox" name="isAboriginal" value="true" {{{Personal.isStudent.aboriginal:checked}}} /> <span class="space">Aboriginal?</span>
            <input type="checkbox" name="isTorresStraitIs" value="true" {{{Personal.isStudent.torresStraitIs:checked}}} /> <span>Torres Strait Is?</span>
          </div>
        </div>
      @whole-connection
        [label "Birth date" for "dateOfBirth"]
        <input type="date" id="dateOfBirth" name="dateOfBirth" min="2000-00-00" value="{{{Personal.dateOfBirth}}}" placeholder="Date of Birth" required />
      @half-connection
        [label "Student's nationality*" for "nationality"]
        <input type="text" id="nationality" name="nationality" placeholder="Nationality" value="{{{Personal.nationality}}}" required />
      @half-connection
        [label "Language spoken at home*" for "languageAtHome"]
        <input type="text" id="languageAtHome" name="languageAtHome" placeholder="Language" value="{{{Personal.languageAtHome}}}" required />
      @//
    </div>
    <div class="row">
      @fourth
        [label "Address" for "address"]
        <input type="text" name="address" id="address" placeholder="Address" value="{{{Personal.address}}}" />
      @fourth-connection
        [label "Town" for "address"]
        <input type="text" name="town" id="town" placeholder="Town" value="{{{Personal.town}}}" />
      @fourth-connection
        [label "State" for "address"]
        <input type="text" name="state" id="state" placeholder="State" value="{{{Personal.state}}}" />
      @fourth-connection
        [label "Post code" for "address"]
        <input type="text" name="postCode" id="postCode" placeholder="Postcode" value="{{{Personal.postCode}}}" />
      @half-connection
        [label "Lives with" for "livesWith"]
        <input type="text" name="livesWith" id="livesWith" placeholder="Lives with" value="{{{Personal.livesWith}}}" />
      @half-connection
        [label "Religion" for "religion"]
        <input type="text" name="religion" id="religion" placeholder="Religion" value="{{{Personal.religion}}}" />
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
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="hasBeenExpelled" {{{Education.hasBeenExpelled::true--checked}}} /> Expelled <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="hasBeenSuspended" {{{Education.hasBeenSuspended::true--checked}}} /> Suspended <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="hasBeenRefused" {{{Education.hasBeenRefused::true--checked}}} /> Refused admission to a school? <br />
          </div>
        </div>
      @half-connection
        [label "Previous school" for "previousSchool"]
        <input type="text" id="previousSchool" name="previousSchool" placeholder="Previous school" value="{{{Education.previousSchool}}}" required />
      @whole-connection
        <textarea name="pleaseExplainEducation" id="pleaseExplainEducation" style="display: none;" placeholder="Please explain">{{{Education.details}}}</textarea>
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
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="hasDisciplineIssues" {{{Behaviour.hasDisciplineIssues::true--checked}}} /> Had discipline issues? <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="hasBeenArrested" {{{Behaviour.hasBeenArrested::true--checked}}} /> Been arrested? <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="usedAlcoholOrTobacco" {{{Behaviour.usedAlcoholOrTobacco::true--checked}}} /> Used alcohol or tobacco? <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="usedIllegalDrugs" {{{Behaviour.usedIllegalDrugs::true--checked}}} /> Used illegal drugs of any kind? <br />
          </div>
        </div>
      @whole-connection
        <textarea id="pleaseExplainBehaviour" name="pleaseExplainBehaviour" style="display: none;" placeholder="Please explain">{{{Behaviour.explain}}}</textarea>
      @//
    </div><!--./behaviour info row-->
    <!-- Medical information, Doc/Health Fund Info, Medical Information, Medical Conditions. -->
    <div class="row">
      @third-expands
        <h3 class="next">
          <span>Doctor/Health Fund</span>
        </h3>
        <div class="field">
          <p>Private ambulance</p>
          <div class="fields">
            <input type="radio" class="toggle-checkbox" data-toggle="#pleaseExplainPrivateHealth" name="privateAmbulance" value="true" {{{Medical.DoctorHealthFund.private.ambulance:checked}}} /> Yes <br />
            <input type="radio" name="privateAmbulance" value="false" {{{Medical.DoctorHealthFund.private.ambulance!:checked}}} /> No <br />
          </div>
        </div>
        <div class="field">
          <p>Private health fund</p>
          <div class="fields">
            <input type="radio" class="toggle-checkbox" data-toggle="#pleaseExplainPrivateHealth" name="privateHealthFund" value="true" {{{Medical.DoctorHealthFund.private.healthFund:checked}}} /> Yes <br />
            <input type="radio" name="privateHealthFund" value="false" {{{Medical.DoctorHealthFund.private.healthFund!:checked}}} /> No <br />
          </div>
        </div>
        <textarea name="pleaseExplainPrivateHealth" id="pleaseExplainPrivateHealth" style="display: none;" placeholder="Company and Member #">{{{Medical.DoctorHealthFund.private.companyAndMemberId}}}</textarea>
        <div class="spacer"></div>
        [label "Medicare Number" for "medicareNumber"]
        <input type="text" id="medicareNumber" name="medicareNumber" placeholder="Medicare Number" value="{{{Medical.DoctorHealthFund.medicareNumber}}}" required />
        [label "Medicare Expiry Date" for "medicareExpiry"]
        <input type="text" id="medicareExpiry" name="medicareExpiry" placeholder="Medicare Expiry" value="{{{Medical.DoctorHealthFund.medicareExpiryDate}}}" required />
        [label "Medicare Position" for "medicarePosition"]
        <input type="text" id="medicarePosition" name="medicarePositionOnCard" placeholder="Position on Card" value="{{{Medical.DoctorHealthFund.medicarePositionOnCard}}}" required />
      <!--end of doctor and health fund information-->
      @third-expands-connection
        <h3 class="next">
          <span>Medical Information</span>
        </h3>
        [label "Doctors Name" for "doctorName"]
        <input type="text" id="doctorName" name="doctorName" placeholder="Doctors Name" value="{{{Medical.MedicalInformation.doctorName}}}" required />
        [label "Doctors Phone" for "doctorPhone"]
        <input type="text" id="doctorPhone" class="bottom" name="doctorPhone" placeholder="Doctors Phone" value="{{{Medical.MedicalInformation.doctorPhone}}}" required />
        <div class="field">
          <p>Is the student immunised?</p>
          <div class="fields">
            <input type="radio" name="immunised" value="true" {{{Medical.MedicalInformation.isImmunised:checked}}} required /> Yes <br />
            <input type="radio" name="immunised" value="false" {{{Medical.MedicalInformation.isImmunised!:checked}}} required /> No <br />
          </div>
        </div>
        <div class="field">
          <p>Does student wear:</p>
          <div class="fields">
            <input type="checkbox" name="wearsGlasses" value="true" {{{Medical.MedicalInformation.wears.glasses:checked}}} /> Glasses </br />
            <input type="checkbox" name="wearsContacts" value="true" {{{Medical.MedicalInformation.wears.contacts:checked}}} /> Contacts <br />
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
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAsthma" value="true" {{{Medical.MedicalConditions.has.asthma:checked}}} /> Asthma <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasADHD" value="true" {{{Medical.MedicalConditions.has.adhd:checked}}} /> ADHD <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasDiabetes" value="true" {{{Medical.MedicalConditions.has.diabetes:checked}}} /> Diabetes <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasEpilepsey" value="true" {{{Medical.MedicalConditions.has.epilepsey:checked}}} /> Epilepsey <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAutism" value="true" {{{Medical.MedicalConditions.has.autism:checked}}} /> Autism <br />
            <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAllergies" value="true" {{{Medical.MedicalConditions.has.allergies:checked}}} /> Allergies <br />
          </div>
        </div>
        <textarea name="pleaseExplainCondition" id="pleaseExplainCondition" style="display: none;" placeholder="Please explain">{{{Medical.MedicalConditions.has.explain}}}</textarea>
        <div class="field">
          <p>Has the student recieved early intervention?</p>
          <div class="fields">
            <input type="radio" name="earlyIntervention" value="true" {{{Medical.MedicalConditions.earlyIntervention:checked}}} /> Yes <br />
            <input type="radio" name="earlyIntervention" value="false" {{{Medical.MedicalConditions.earlyIntervention!:checked}}} /> No <br />
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
          <input type="text" id="emergencyName1" name="emergencyName1" placeholder="Name 1" value="{{{Emergency.0.name}}}" />
          [label "Phone*" for "emergencyPhone1"]
          <input type="text" id="emergencyPhone1" name="emergencyPhone1" placeholder="Phone 1" value="{{{Emergency.0.phone}}}" />
          [label "Relationship to Student*" for "emergencyRelationship1"]
          <input type="text" id="emergencyRelationship1" name="emergencyRelationship1" placeholder="Relationship to Student" value="{{{Emergency.0.relationship}}}" />
        </div>
      @half-connection
        <div class="row">
          <h3 class="next">
            <span>Emergency Contact Information #2</span>
          </h3>
          [label "Name 2*" for "emergencyName2"]
          <input type="text" id="emergencyName2" name="emergencyName2" placeholder="Name 2" value="{{{Emergency.1.name}}}" />
          [label "Phone*" for "emergencyPhone2"]
          <input type="text" id="emergencyPhone2" name="emergencyPhone2" placeholder="Phone 2" value="{{{Emergency.1.phone}}}" />
          [label "Relationship to Student*" for "emergencyRelationship2"]
          <input type="text" id="emergencyRelationship2" name="emergencyRelationship2" placeholder="Relationship to Student" value="{{{Emergency.1.relationship}}}" />
        </div>
      @//
    </div><!--./emergency contact info row-->
    <input type="submit" value="Save Student" style="margin-top: 10px;" />
  </form><!--./end of entire form-->
</div><!--./end of modal body-->
