<div class="printable-family">
  <form class="kasform">
    <div class="row">
      <div class="col-lg-2">
        <h3 style="padding-top: 1px;"></h3>
      </div>
      <div class="spaced-third">
        <h3>
          <span>Mother's Details</span>
        </h3>
      </div>
      <div class="spaced-third">
        <h3>
          <span>Father's Details</span>
        </h3>
      </div>
      <div class="spaced-third">
        <h3>
          <span>Guardian's Details</span>
        </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Name</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.fname}}}
        {{{Mother.lname}}}
      </div>
      <div class="spaced-third center">
        {{{Father.fname}}}
        {{{Father.lname}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.fname}}}
        {{{Guardian.lname}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Occupation</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.occupation}}}
      </div>
      <div class="spaced-third center">
        {{{Father.occupation}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.occupation}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Nationality</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.nationality}}}
      </div>
      <div class="spaced-third center">
        {{{Father.nationality}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.nationality}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>First Language</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.firstLanguage}}}
      </div>
      <div class="spaced-third center">
        {{{Father.firstLanguage}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.firstLanguage}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Employer</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.employer}}}
      </div>
      <div class="spaced-third center">
        {{{Father.employer}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.employer}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Religion - POW</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.religion}}} -
        {{{Mother.placeOfWorship}}}
      </div>
      <div class="spaced-third center">
        {{{Father.religion}}} -
        {{{Father.placeOfWorship}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.religion}}} -
        {{{Guardian.placeOfWorship}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Home Phone</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.homePhone}}}
      </div>
      <div class="spaced-third center">
        {{{Father.homePhone}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.homePhone}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Business Phone</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.businessPhone}}}
      </div>
      <div class="spaced-third center">
        {{{Father.businessPhone}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.businessPhone}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Mobile Phone</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.mobilePhone}}}
      </div>
      <div class="spaced-third center">
        {{{Father.mobilePhone}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.mobilePhone}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Address</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.address}}}
      </div>
      <div class="spaced-third center">
        {{{Father.address}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.address}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Town</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.town}}}
      </div>
      <div class="spaced-third center">
        {{{Father.town}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.town}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>State</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.state}}}
      </div>
      <div class="spaced-third center">
        {{{Father.state}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.state}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Postcode</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.postcode}}}
      </div>
      <div class="spaced-third center">
        {{{Father.postcode}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.postcode}}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">
        <strong>Email</strong>
      </div>
      <div class="spaced-third center">
        {{{Mother.email}}}
      </div>
      <div class="spaced-third center">
        {{{Father.email}}}
      </div>
      <div class="spaced-third center">
        {{{Guardian.email}}}
      </div>
    </div>
    <div class="row" style="margin-top: 20px;">
      <!-- <p class="field-label">Please tick whichever box applies: <span class="required">*</span></p> -->
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
  </form>
</div>
