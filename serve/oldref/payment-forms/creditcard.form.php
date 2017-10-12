<?php
  $Family = unserialize($_SESSION['form']['families'][0]); $Family->Fees();
  /*$FamilyMember is family member that's being captured, passed from parent
  page.*/
?>
<div class="row">
  <!--name on card, credit card number, expiry date-->
  @third
    [label "Name (as appears on card)*" for "cc_name_on_card"]
    <input
      id="cc_name_on_card"
      type="text"
      placeholder="Name (as appears on card)"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'creditcard', 'cc_nameOnCard', this.value)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_nameOnCard']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_nameOnCard']: '';?>"
    />
  @third-connection
    [label "Card number (no dashes or spaces)*" for "cc_credit_card_no"]
    <input
      id="cc_credit_card_no"
      type="number"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'creditcard', 'cc_cardNumber', this.value)"
      placeholder="Card number (no dashes or spaces)"
      value="<?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_cardNumber']))? $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_cardNumber']: '';?>"
    />
  @third-connection
    [label "Amount to be deducted per fortnight*" for "cc_to_be_deducted"]
    <input
      id="cc_to_be_deducted"
      type="text"
      class="master_unlock"
      name="cc_to_be_deducted"
      placeholder="Amount"
      disabled="disabled"
      onkeyup="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'creditcard', 'cc_toBeDeducted', this.value)"
      value="$<?=number_format(($Family->ImportantTotals['FortnightlyPayments']* $Family->FamilySplitPercentages[$FamilyMember]/100), 2)?>"
    />
  @whole-connection
    [label "Expiry date*" for "cc_expiry_date_month"]
  @half-connection
    <select
      onchange="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'creditcard', 'cc_expiryDateMonth', this.value)"
    >
      <option value="none">-- Month --</option>
      <option value="1" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '1')? 'selected="selected"': '';?>>01 - January</option>
      <option value="2" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '2')? 'selected="selected"': '';?>>02 - February</option>
      <option value="3" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '3')? 'selected="selected"': '';?>>03 - March</option>
      <option value="4" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '4')? 'selected="selected"': '';?>>04 - April</option>
      <option value="5" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '5')? 'selected="selected"': '';?>>05 - May</option>
      <option value="6" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '6')? 'selected="selected"': '';?>>06 - June</option>
      <option value="7" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '7')? 'selected="selected"': '';?>>07 - July</option>
      <option value="8" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '8')? 'selected="selected"': '';?>>08 - August</option>
      <option value="9" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '9')? 'selected="selected"': '';?>>09 - September</option>
      <option value="10" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '10')? 'selected="selected"': '';?>>10 - October</option>
      <option value="11" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '11')? 'selected="selected""': '';?>>11 - November</option>
      <option value="12" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateMonth'] == '12')? 'selected="selected"': '';?>>12 - December</option>
    </select>
  @half-connection
    <select
      onchange="window.UpdateMethodOfPaymentDetails('<?=$FamilyMember?>', 'creditcard', 'cc_expiryDateYear', this.value)"
    >
      <option value="none">-- Year --</option>
      <?php for ($i = date('Y'); $i <= date('Y')+10; $i++): ?>
        <option value="<?=$i?>" <?=(isset($Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateYear']) && $Family->MethodOfPaymentDetails[$FamilyMember]['fields']['cc_expiryDateYear'] == $i)? 'selected="selected"': '';?>><?=$i?></option>
      <?php endfor; ?>
    </select>
  @//
</div>
<div class="clear"></div>
