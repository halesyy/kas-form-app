<div class="modal-header">
  <span class="close remove-for-print">&times;</span>
  <h2 class="remove-for-print">Add new family</h2>
</div>
<div class="modal-body">
  <form class="kasform" id="FamilyForm" enctype="multipart/form-data">
    <div class="row">
      @third
        <h3>
          <span>Mother's Details</span>
        </h3>
        <div class="row">
          [label "First name" for "motherFname"]
          <input type="text" id="motherFname" name="motherFname" placeholder="First name" value="{{{Mother.fname}}}" />
          [label "Last name" for "motherLname"]
          <input type="text" id="motherLname" name="motherLname" placeholder="Last name" value="{{{Mother.lname}}}" />
          [label "Occupation" for "motherOccupation"]
          <input type="text" id="motherOccupation" name="motherOccupation" placeholder="Occupation" value="{{{Mother.occupation}}}" />
          [label "Nationality" for "motherNationality"]
          <input type="text" id="motherNationality" name="motherNationality" placeholder="Nationality" value="{{{Mother.nationality}}}" />
          [label "First Language" for "motherFirstLanguage"]
          <input type="text" id="motherFirstLanguage" name="motherFirstLanguage" placeholder="First Language" value="{{{Mother.firstLanguage}}}" />
          [label "Employer" for "motherEmployer"]
          <input type="text" id="motherEmployer" name="motherEmployer" placeholder="Employer" value="{{{Mother.employer}}}" />
          [label "Religion" for "motherReligion"]
          <input type="text" id="motherReligion" name="motherReligion" placeholder="Religion" value="{{{Mother.religion}}}" />
          [label "Place of Worship" for "motherPlaceOfWorship"]
          <input type="text" id="motherPlaceOfWorship" name="motherPlaceOfWorship" placeholder="Place of Worship" value="{{{Mother.placeOfWorship}}}" />
          [label "Phone" for "motherHomePhone"]
          <input type="text" id="motherHomePhone" name="motherHomePhone" placeholder="Phone" value="{{{Mother.homePhone}}}" />
          [label "Business Phone" for "motherBusinessPhone"]
          <input type="text" id="motherBusinessPhone" name="motherBusinessPhone" placeholder="BusinessPhone" value="{{{Mother.businessPhone}}}" />
          [label "Mobile Phone" for "motherMobilePhone"]
          <input type="text" id="motherMobilePhone" name="motherMobilePhone" placeholder="MobilePhone" value="{{{Mother.mobilePhone}}}" />
          [label "Address" for "motherAddress"]
          <input type="text" id="motherAddress" name="motherAddress" placeholder="Address" value="{{{Mother.address}}}" />
          [label "Town" for "motherTown"]
          <input type="text" id="motherTown" name="motherTown" placeholder="Town" value="{{{Mother.town}}}" />
          [label "State" for "motherState"]
          <input type="text" id="motherState" name="motherState" placeholder="State" value="{{{Mother.state}}}" />
          [label "Post code" for "motherPostcode"]
          <input type="text" id="motherPostcode" name="motherPostcode" placeholder="Post code" value="{{{Mother.postcode}}}" />
          [label "Email" for "motherEmail"]
          <input type="text" id="motherEmail" name="motherEmail" placeholder="Email" value="{{{Mother.email}}}" />
        </div>
      @third-connection
        <h3>
          <span>Father's Details</span>
        </h3>
        <div class="row">
            [label "First name" for "fatherFname"]
            <input type="text" id="fatherFname" name="fatherFname" placeholder="First name" value="{{{Father.fname}}}" />
            [label "Last name" for "fatherLname"]
            <input type="text" id="fatherLname" name="fatherLname" placeholder="Last name" value="{{{Father.lname}}}" />
            [label "Occupation" for "fatherOccupation"]
            <input type="text" id="fatherOccupation" name="fatherOccupation" placeholder="Occupation" value="{{{Father.occupation}}}" />
            [label "Nationality" for "fatherNationality"]
            <input type="text" id="fatherNationality" name="fatherNationality" placeholder="Nationality" value="{{{Father.nationality}}}" />
            [label "First Language" for "fatherFirstLanguage"]
            <input type="text" id="fatherFirstLanguage" name="fatherFirstLanguage" placeholder="First Language" value="{{{Father.firstLanguage}}}" />
            [label "Employer" for "fatherEmployer"]
            <input type="text" id="fatherEmployer" name="fatherEmployer" placeholder="Employer" value="{{{Father.employer}}}" />
            [label "Religion" for "fatherReligion"]
            <input type="text" id="fatherReligion" name="fatherReligion" placeholder="Religion" value="{{{Father.religion}}}" />
            [label "Place of Worship" for "fatherPlaceOfWorship"]
            <input type="text" id="fatherPlaceOfWorship" name="fatherPlaceOfWorship" placeholder="Place of Worship" value="{{{Father.placeOfWorship}}}" />
            [label "Phone" for "fatherHomePhone"]
            <input type="text" id="fatherHomePhone" name="fatherHomePhone" placeholder="Phone" value="{{{Father.homePhone}}}" />
            [label "Business Phone" for "fatherBusinessPhone"]
            <input type="text" id="fatherBusinessPhone" name="fatherBusinessPhone" placeholder="BusinessPhone" value="{{{Father.businessPhone}}}" />
            [label "Mobile Phone" for "fatherMobilePhone"]
            <input type="text" id="fatherMobilePhone" name="fatherMobilePhone" placeholder="MobilePhone" value="{{{Father.mobilePhone}}}" />
            [label "Address" for "fatherAddress"]
            <input type="text" id="fatherAddress" name="fatherAddress" placeholder="Address" value="{{{Father.address}}}" />
            [label "Town" for "fatherTown"]
            <input type="text" id="fatherTown" name="fatherTown" placeholder="Town" value="{{{Father.town}}}" />
            [label "State" for "fatherState"]
            <input type="text" id="fatherState" name="fatherState" placeholder="State" value="{{{Father.state}}}" />
            [label "Post code" for "fatherPostcode"]
            <input type="text" id="fatherPostcode" name="fatherPostcode" placeholder="Post code" value="{{{Father.postcode}}}" />
            [label "Email" for "fatherEmail"]
            <input type="text" id="fatherEmail" name="fatherEmail" placeholder="Email" value="{{{Father.email}}}" />
        </div>
      @third-connection
        <h3>
          <span>Guardian's Details</span>
        </h3>
        <div class="row">
            [label "First name" for "guardianFname"]
            <input type="text" id="guardianFname" name="guardianFname" placeholder="First name" value="{{{Guardian.fname}}}" />
            [label "Last name" for "guardianLname"]
            <input type="text" id="guardianLname" name="guardianLname" placeholder="Last name" value="{{{Guardian.lname}}}" />
            [label "Occupation" for "guardianOccupation"]
            <input type="text" id="guardianOccupation" name="guardianOccupation" placeholder="Occupation" value="{{{Guardian.occupation}}}" />
            [label "Nationality" for "guardianNationality"]
            <input type="text" id="guardianNationality" name="guardianNationality" placeholder="Nationality" value="{{{Guardian.nationality}}}" />
            [label "First Language" for "guardianFirstLanguage"]
            <input type="text" id="guardianFirstLanguage" name="guardianFirstLanguage" placeholder="First Language" value="{{{Guardian.firstLanguage}}}" />
            [label "Employer" for "guardianEmployer"]
            <input type="text" id="guardianEmployer" name="guardianEmployer" placeholder="Employer" value="{{{Guardian.employer}}}" />
            [label "Religion" for "guardianReligion"]
            <input type="text" id="guardianReligion" name="guardianReligion" placeholder="Religion" value="{{{Guardian.religion}}}" />
            [label "Place of Worship" for "guardianPlaceOfWorship"]
            <input type="text" id="guardianPlaceOfWorship" name="guardianPlaceOfWorship" placeholder="Place of Worship" value="{{{Guardian.placeOfWorship}}}" />
            [label "Phone" for "guardianHomePhone"]
            <input type="text" id="guardianHomePhone" name="guardianHomePhone" placeholder="Phone" value="{{{Guardian.homePhone}}}" />
            [label "Business Phone" for "guardianBusinessPhone"]
            <input type="text" id="guardianBusinessPhone" name="guardianBusinessPhone" placeholder="BusinessPhone" value="{{{Guardian.businessPhone}}}" />
            [label "Mobile Phone" for "guardianMobilePhone"]
            <input type="text" id="guardianMobilePhone" name="guardianMobilePhone" placeholder="MobilePhone" value="{{{Guardian.mobilePhone}}}" />
            [label "Address" for "guardianAddress"]
            <input type="text" id="guardianAddress" name="guardianAddress" placeholder="Address" value="{{{Guardian.address}}}" />
            [label "Town" for "guardianTown"]
            <input type="text" id="guardianTown" name="guardianTown" placeholder="Town" value="{{{Guardian.town}}}" />
            [label "State" for "guardianState"]
            <input type="text" id="guardianState" name="guardianState" placeholder="State" value="{{{Guardian.state}}}" />
            [label "Post code" for "guardianPostcode"]
            <input type="text" id="guardianPostcode" name="guardianPostcode" placeholder="Post code" value="{{{Guardian.postcode}}}" />
            [label "Email" for "guardianEmail"]
            <input type="text" id="guardianEmail" name="guardianEmail" placeholder="Email" value="{{{Guardian.email}}}" />
        </div>
      @//
    </div><!--./end of mother|father|guardian row-->
    <div class="row">
      <p class="field-label">Please tick whichever box applies: <span class="required">*</span></p>
      <div class="field">
        <div class="fields">
          @third
            <input type="checkbox" name="motherDeceased" value="true" {{{Conditions.motherDeceased:checked}}} /> Mother Deceased <br/>
            <input type="checkbox" name="fatherDeceased" value="true" {{{Conditions.fatherDeceased:checked}}} /> Father Deceased <br/>
            <input type="checkbox" name="motherRemarried" value="true" {{{Conditions.motherRemarried:checked}}} /> Mother Remarried <br/>
            <input type="checkbox" name="fatherRemarried" value="true" {{{Conditions.fatherRemarried:checked}}} /> Father Remarried
          @third-connection
            <input type="checkbox" name="married" value="true" {{{Conditions.married:checked}}} /> <span class="space">Married</span>
            <input type="checkbox" name="defacto" value="true" {{{Conditions.defacto:checked}}} /> Defacto <br/>
            <input type="checkbox" name="parentsSeperated" value="true" {{{Conditions.parentsSeperated:checked}}} /> Parents Seperated <br/>
            <input type="checkbox" name="parentsDivorced" value="true" {{{Conditions.parentsDivorced:checked}}} /> Parents Divorced <br/>
            <input type="checkbox" name="single" value="true" {{{Conditions.single:checked}}} /> Single
          @third-connection
            <input type="checkbox" name="guardian" value="true" {{{Conditions.guardian:checked}}} /> Guardian <br/>
            <input type="checkbox" name="stepParent" value="true" {{{Conditions.stepParent:checked}}} /> Step Parent <br/>
            <input type="checkbox" name="grandparent" value="true" {{{Conditions.grandparent:checked}}} /> Grand Parent <br/>
            <input type="checkbox" name="courtOrder" value="true" {{{Conditions.courtOrder:checked}}} /> Court Order**
          @//
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <div class="row print-page-dedicated">
      <h3>
        <span>Students under family</span>
      </h3>
      <p class="note">
        Please select all students that fit under this family name/ tree from the list below:
      </p>
      <p>
        <?php if (isset($_SESSION['form']['students'])) foreach($_SESSION['form']['students'] as $index => &$Student):
        $Student = unserialize($Student); if ($Student->HasFamily()) { $Student = serialize($Student); continue; } ?>
            <input type="checkbox" name="studentUnderFamily<?=$index?>" value="<?=$index?>" />
              <?=($Student->Get('Personal', ['fname']))?>
              <?=($Student->Get('Personal', ['mname']) === false || $Student->Get('Personal', ['mname']) === '')? '': "{$Student->Get('Personal', ['mname'])[0]}.";?>
              <?=($Student->Get('Personal', ['lname']))?>
            <br/>
        <?php $Student = serialize($Student);
        endforeach; ?>
      </p>
    </div>

    <input type="submit" class="remove-for-print" value="Save Family" style="margin-top: 10px;" />
  </form>
</div>
