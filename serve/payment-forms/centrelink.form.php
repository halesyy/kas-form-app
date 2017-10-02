<?php
  $Family = unserialize($_SESSION['form']['families'][0]); $Family->Fees();
  /*$FamilyMember is family member that's being captured, passed from parent
  page.*/
?>
<div class="row">
  <!--family name, given name, date of birth, centrelink reference number (FORMAT STRUCTURE)
  from which payment do you want the deducation taken, e.g. age pension, newstart allow,
  family tax benef or parent leave pay
  amount to be deducted (PREPOPULATED), payment date for deduction to commerce (check box for "next date"
  or a future payment date presented by person)-->
  @third
    [label "Family Name*" for "cl_family_name"]
    <input
      id="cl_family_name"
      type="text"
      name="cl_family_name"
      placeholder="Family Name"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_familyName', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_familyName']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_familyName']: '';?>"
    />
  @third-connections
    [label "Given Name*" for "cl_given_name"]
    <input
      id="cl_given_name"
      type="text"
      name="cl_given_name"
      placeholder="Given Name"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_givenName', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_givenName']))
      ? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_givenName']: '';?>"
    />
  @third-connection
    [label "Date of Birth*" for "cl_date_of_birth"]
    <input
      id="cl_date_of_birth"
      type="date"
      name="cl_date_of_birth"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_dateOfBirth', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_dateOfBirth']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_dateOfBirth']: '';?>"
    />
  @whole-connection
    [label "Centrelink Reference Number*" for "cl_refnum_first"]
  @whole-connection
    <input
      id="cl_refnum_first"
      type="number"
      style="width: 25%;"
      min="100" max="999"
      placeholder="First 3 numbers"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_refnumFirst', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumFirst']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumFirst']: '';?>"
    /> -
    <input
      id="cl_refnum_second"
      type="number"
      style="width: 25%;"
      min="100" max="999"
      placeholder="Second 3 numbers"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_refnumSecond', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumSecond']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumSecond']: '';?>"
    /> -
    <input
      id="cl_refnum_third"
      type="number"
      style="width: 25%;"
      min="100" max="999"
      placeholder="Third 3 numbers"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_refnumThird', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumThird']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumThird']: '';?>"
    /> -
    <input
      id="cl_refnum_fourth"
      type="number"
      style="width: 10%;"
      min="1" max="9"
      placeholder="Last"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_refnumFourth', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumFourth']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_refnumFourth']: '';?>"
    />
  @half-connection
    [label "Payment Deduction From*" for "cl_deduct_from"]
    <select
      id="cl_deduct_from"
      onchange="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_deductFrom', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom']: '';?>"
    >
      <option value="none">-- Select --</option>
      <option value="agePension" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom'] == 'agePension')? 'selected="selected"': '';?>>Age Pension</option>
      <option value="newstartAllowance" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom'] == 'newstartAllowance')? 'selected="selected"': '';?>>Newstart Allowance</option>
      <option value="familyTaxBenefits" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom'] == 'familyTaxBenefits')? 'selected="selected"': '';?>>Family Tax Benefits</option>
      <option value="parentLeavePay" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cl_deductFrom'] == 'parentLeavePay')? 'selected="selected"': '';?>>Parent Leave Pay</option>
    </select>
  @half-connection
    [label "Amount to be deducted per fortnight*" for "cl_to_be_deducted"]
    <input
      id="cl_to_be_deducted"
      type="text"
      name="cl_to_be_deducted"
      placeholder="Amount"
      disabled="disabled"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'centrelink', 'cl_toBeDeducted', this.value)"
      value="$<?=number_format(($Family->ImportantTotals['FortnightlyPayments'] * $Family->FamilySplitPercentages[$FamilyMember]/100), 2)?>"
    />
  @whole-connection
    [label "First payment date for deduction to commence*" for "cl_commence_checkbox"]
  @whole-connection
    <input type="checkbox" onclick="$('#cl_select_date').slideToggle();" id="cl_commence_checkbox" checked="checked" value="first_payment_date" title="Start deducting payments from the closest deduction time to the current date. Keep ticked if you're enrolling student into school ASAP." /> Next available payment date <br/>
    <div id="cl_select_date" style="display: none;">
      <hr />
      <h4 style="color: #666;;"><span>Please pick a date for deductions to commence.</span></h4>
      <input type="week" name="cl_payment_date_week" value="<?=date('Y-').'W'.date('W')?>" />
      <input type="date" name="cl_payment_date" />
    </div>
  @//
</div>
