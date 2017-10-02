<div class="printable-student">
  <form class="kasform">

    <div class="row">
      <h3><span>Personal</span></h3>

      <div class="row">
        <div class="col-lg-2">
          <strong>Name</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.fname}}}
          {{{Personal.mname}}}
          {{{Personal.lname}}}
          ({{{Personal.pname}}})
        </div>
        <div class="col-lg-2">
          <strong>Age</strong>
        </div>
        <div class="col-lg-4">
          {{{Age()}}}
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2">
          <strong>Enrol Year</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.yearToEnrol}}}
        </div>
        <div class="col-lg-2">
          <strong>Year Level</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.yearLevel}}}
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2">
          <strong>Gender</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.gender}}}
        </div>
        <div class="col-lg-2">
          <strong>Nationality</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.nationality}}}
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2">
          <strong>Home Language</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.languageAtHome}}}
        </div>
        <div class="col-lg-2">
          <strong>Lives with</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.livesWith}}}
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2">
          <strong>Location</strong>
        </div>
        <div class="col-lg-10">
          {{{Personal.address}}},
          {{{Personal.town}}}
          ({{{Personal.postCode}}}),
          {{{Personal.state}}}
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2">
          <strong>Religion</strong>
        </div>
        <div class="col-lg-4">
          {{{Personal.religion}}}
        </div>
        <div class="col-lg-6">
          <div class="field" style="padding: 0;">
            <div class="fields">
              <input type="checkbox" name="isAboriginal" value="true" {{{Personal.isStudent.aboriginal:checked}}} /> <span class="space">Aboriginal</span>
              <input type="checkbox" name="isTorresStraitIs" value="true" {{{Personal.isStudent.torresStraitIs:checked}}} /> <span>Torres Strait Is</span>
            </div>
          </div>
        </div>
      </div>


      <div class="row" style="padding-top: 5px;">
        <div class="col-lg-6">
          <h3><span>Education</span></h3>
        </div>
        <div class="col-lg-6">
          <h3><span>Behaviour</span></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="row" style="padding-bottom: 5px;">
              <div class="col-lg-6">
                <strong>Previous School</strong>
              </div>
              <div class="col-lg-6">
                {{{Education.previousSchool}}}
              </div>
            </div>
            <div class="field" style="background-color: white;">
              <div class="fields">
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="hasBeenExpelled" {{{Education.hasBeenExpelled::true--checked}}} /> Expelled <br />
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="hasBeenSuspended" {{{Education.hasBeenSuspended::true--checked}}} /> Suspended <br />
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainEducation" name="hasBeenRefused" {{{Education.hasBeenRefused::true--checked}}} /> Refused admission to a school? <br />
                <p style="padding: 4px 4px 0 0;">
                  <strong>Details:</strong> <br/>
                  {{{Education.details}}}
                </p>
              </div>
            </div>
          </div>
        </div>
        <!---->
        <div class="row">
          <div class="field" style="background-color: white;">
            <div class="fields">
              <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="hasDisciplineIssues" {{{Behaviour.hasDisciplineIssues::true--checked}}} /> Had discipline issues? <br />
              <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="hasBeenArrested" {{{Behaviour.hasBeenArrested::true--checked}}} /> Been arrested? <br />
              <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="usedAlcoholOrTobacco" {{{Behaviour.usedAlcoholOrTobacco::true--checked}}} /> Used alcohol or tobacco? <br />
              <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainBehaviour" name="usedIllegalDrugs" {{{Behaviour.usedIllegalDrugs::true--checked}}} /> Used illegal drugs of any kind? <br />
              <p style="padding: 4px 4px 0 4px;">
                <strong>Details:</strong> <br/>
                {{{Behaviour.explain}}}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3><span>Health Fund</span></h3>

          <div class="row">
            <div class="col-lg-4">
              <strong>Ambulance</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Medical.DoctorHealthFund.private.ambulance}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Health Fund</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Medical.DoctorHealthFund.private.healthFund}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Company <?="&"?> ID</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Medical.DoctorHealthFund.private.companyAndMemberId}}}
              </div>
            </div>
          </div>

          <hr class="padded" />

          <div class="row">
            <div class="col-lg-4">
              <strong>Medicare Number</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Medical.DoctorHealthFund.medicareNumber}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Medicare Expiry</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Medical.DoctorHealthFund.medicareExpiryDate}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Medicare POC</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Medical.DoctorHealthFund.medicarePositionOnCard}}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h3><span>Medical Info</span></h3>

          <div class="row">
            <div class="field" style="background-color: white; padding: 0 5px 5px 0; margin: 0;">
              <div class="fields" style="padding: 5px 0 0 0; margin: 0;">
                <p style="padding: 0; margin: 0;">Student suffers from:</p>
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAsthma" value="true" {{{Medical.MedicalConditions.has.asthma:checked}}} /> Asthma <br />
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasADHD" value="true" {{{Medical.MedicalConditions.has.adhd:checked}}} /> ADHD <br />
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasDiabetes" value="true" {{{Medical.MedicalConditions.has.diabetes:checked}}} /> Diabetes <br />
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasEpilepsey" value="true" {{{Medical.MedicalConditions.has.epilepsey:checked}}} /> Epilepsey <br />
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAutism" value="true" {{{Medical.MedicalConditions.has.autism:checked}}} /> Autism <br />
                <input type="checkbox" class="toggle-checkbox" data-toggle="#pleaseExplainCondition" name="hasAllergies" value="true" {{{Medical.MedicalConditions.has.allergies:checked}}} /> Allergies <br />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-5">
              <strong>Early Intervention</strong>
            </div>
            <div class="col-lg-7">
              <div class="fields">
                {{{Medical.MedicalConditions.earlyIntervention}}}
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row" style="padding-top: 5px;">
        <div class="row">
          <h3><span>Medical Info</span></h3>

          <div class="col-lg-2">
            <strong>Doctor Name</strong>
          </div>
          <div class="col-lg-4">
            <div class="fields">
              {{{Medical.MedicalInformation.doctorName}}}
            </div>
          </div>
          <div class="col-lg-2">
            <strong>Doctor Phone</strong>
          </div>
          <div class="col-lg-4">
            {{{Medical.MedicalInformation.doctorPhone}}}
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2">
            <strong>Immunised</strong>
          </div>
          <div class="col-lg-4">
            <div class="fields">
              {{{Medical.MedicalInformation.isImmunised}}}
            </div>
          </div>
          <div class="col-lg-2">
            <strong>Student wears:</strong>
          </div>
          <div class="col-lg-4">
            <div class="fields">
              <input type="checkbox" name="wearsGlasses" value="true" {{{Medical.MedicalInformation.wears.glasses:checked}}} /> Glasses <span class="space"></span>
              <input type="checkbox" name="wearsContacts" value="true" {{{Medical.MedicalInformation.wears.contacts:checked}}} /> Contacts
            </div>
          </div>
        </div>
      </div>


      <div class="row" style="padding-top: 20px;">
        <div class="col-lg-6">
          <h3><span>Emergency One</span></h3>

          <div class="row">
            <div class="col-lg-4">
              <strong>Name</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Emergency.0.name}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Phone</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Emergency.0.phone}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Relationship</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Emergency.1.relationship}}}
              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-6">
          <h3><span>Emergency Two</span></h3>

          <div class="row">
            <div class="col-lg-4">
              <strong>Name</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Emergency.1.name}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Phone</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Emergency.1.phone}}}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <strong>Relationship</strong>
            </div>
            <div class="col-lg-8">
              <div class="fields">
                {{{Emergency.0.relationship}}}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </form>
</div>
