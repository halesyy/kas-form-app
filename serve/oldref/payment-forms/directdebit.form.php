<?php
  $Family = unserialize($_SESSION['form']['families'][0]); $Family->Fees();
  /*$FamilyMember is family member that's being captured, passed from parent
  page.*/
?>
<div class="row">
  @half
    [label "Banking Institution*" for "dd_banking_institute"]
    <!--name of banking inst, account ame, bsb, account number-->
    <input
      id="dd_banking_institute"
      type="text"
      name="dd_banking_institute"
      placeholder="Banking Institution"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'directdebit', 'dd_bankingInstitution', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_bankingInstitution']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_bankingInstitution']: '';?>"
    />
  @half-connection
    [label "Account Name*" for "dd_account_name"]
    <input
      id="dd_account_name"
      type="text"
      name="dd_account_name"
      placeholder="Account Name"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'directdebit', 'dd_accountName', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_accountName']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_accountName']: '';?>"
    />
  @third-connection
    [label "BSB*" for "dd_bsb"]
    <input
      id="dd_bsb"
      type="text"
      name="dd_bsb"
      placeholder="BSB"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'directdebit', 'dd_BSB', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_BSB']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_BSB']: '';?>"
    />
  @third-connection
    [label "Account Number*" for "dd_account_number"]
    <input
      id="dd_account_number"
      type="number"
      name="dd_account_number"
      placeholder="Account Number"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'directdebit', 'dd_accountNumber', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_accountNumber']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['dd_accountNumber']: '';?>"
    />
  @third-connection
    [label "Amount to be deducted per fortnight*" for "dd_to_be_deducted"]
    <input
      id="dd_to_be_deducted"
      type="text"
      class="master_unlock"
      name="dd_to_be_deducted"
      placeholder="Amount"
      disabled="disabled"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'directdebit', 'dd_toBeDeducted', this.value)"
      value="$<?=number_format(($Family->ImportantTotals['FortnightlyPayments']* $Family->FamilySplitPercentages[$FamilyMember]/100), 2)?>"
    />
  @//
</div>
