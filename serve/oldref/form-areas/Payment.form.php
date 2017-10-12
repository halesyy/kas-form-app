<?php $Family = unserialize($_SESSION['form']['families'][0]); $Family->Fees(); ?>

  <h3>Fee Information</h3>
  <div class="box" style="margin-bottom: 25px;">
    <div class="row">
      @three
        <strong>Payment interval</strong>
      @nine-connection
        <?php
          if ($Family->Interval == 'annually') {
            $Total = $Family->Totals['TotalCostAfterAnnualPromptPayment'];
            echo "$".number_format($Total, 2)." (annually)";
          }
          else if ($Family->Interval == 'termly') {
            $Total = $Family->Totals['TotalCostAfterTermlyPromptPayment'];
            echo "$".number_format($Total, 2)." (termly)";
          }
          else if ($Family->Interval == 'fortnightly') {
            $Total = $Family->Totals['FortnightlyPayments'];
            echo "$".number_format($Total, 2)." (fortnightly)";
          }
          else {}#wtf
        ?>

      @//
    </div>
  </div>
  <hr style="border-bottom: solid lightgrey 1px; margin-bottom: 25px; margin-top: 25px;" />

  <?php foreach ($Family->PaymentResponsibilities as $FamilyMember => $IsResponsible): if ($IsResponsible == "true") {
    $IndividialPercentage = $Family->FamilySplitPercentages[$FamilyMember];
    $IndividialPercentageDecimal = $IndividialPercentage/100;
   ?>
    <h1 style="margin-top: 0;" class="primary"><?=ucwords($FamilyMember)?> Details</h1>
    <h3><?=$Family->FamilySplitPercentages[$FamilyMember]?>% of total fees <font class="primary">($<?=number_format($Total * $IndividialPercentageDecimal, 2)?>)</font></h3>
    <form class="kasform">
      <!--Payment plan: the way they want to pay and the interval.-->

      <!-- Method of payment: change the type of form later. -->
      <h4 style="margin-top: 30px;">Method</h4>
      <div class="box">
        <p>
          <input
            id="PT_Cash"
            type="radio"
            name="paymentType-<?=$FamilyMember?>"
            class="paymentType"
            value="CashPayment"
            onclick="window.SetPaymentMethod('<?=$FamilyMember?>', 'cashpayment')"
            <?php if ($Family->PaymentMethod[$FamilyMember] == "cashpayment") echo "checked='checked'"; ?>
            <?php if (empty($Family->Interval) || $Family->Interval == 'fortnightly') echo "disabled='disabled'"; ?>
          /> Cash Payment <br/>

          <input
            id="PT_CreditCard"
            type="radio"
            name="paymentType-<?=$FamilyMember?>"
            class="paymentType"
            value="CashPayment"
            onclick="window.SetPaymentMethod('<?=$FamilyMember?>', 'creditcard')"
            <?php if ($Family->PaymentMethod[$FamilyMember] == "creditcard") echo "checked='checked'"; ?>
            <?php if (empty($Family->Interval)) echo "disabled='disabled'"; ?>
          /> Credit Card Payment <br/>

          <input
            id="PT_DirectDebit"
            type="radio"
            name="paymentType-<?=$FamilyMember?>"
            class="paymentType"
            value="CashPayment"
            onclick="window.SetPaymentMethod('<?=$FamilyMember?>', 'directdebit')"
            <?php if ($Family->PaymentMethod[$FamilyMember] == "directdebit") echo "checked='checked'"; ?>
            <?php if (empty($Family->Interval)) echo "disabled='disabled'"; ?>
          /> Direct Debit Payment <br/>

          <input
            type="radio"
            id="PT_Centrelink"
            name="paymentType-<?=$FamilyMember?>"
            class="paymentType"
            value="CashPayment"
            onclick="window.SetPaymentMethod('<?=$FamilyMember?>', 'centrelink')"
            <?php if ($Family->PaymentMethod[$FamilyMember] == "centrelink") echo "checked='checked'"; ?>
            <?php if (empty($Family->Interval) || $Family->Interval == 'annually' || $Family->Interval == 'termly') echo "disabled='disabled'"; ?>
          /> Centre Link Payment <br/>
        </p>


        <p>
          <input
            type="checkbox"
            onclick="window.SetRepeatCancel('<?=$FamilyMember?>');"
            class="repeatTillCancelled-<?=$FamilyMember?>"
            <?=($Family->Interval == 'fortnightly' || (isset($Family->RepeatTillCancelled[$FamilyMember]) && $Family->RepeatTillCancelled[$FamilyMember] == "true"))? 'checked="checked"':'';?>
          /> Repeat Payments Till Cancelled <br/>

          <div class="AutomaticIncreaseContainer-<?=$FamilyMember?>" style="display: <?=($Family->RepeatTillCancelled[$FamilyMember] == "true" || $Family->Interval == 'fortnightly')? 'block': 'none';?>;">
            <input
              type="checkbox"
              onclick="window.SetAutomaticIncreases('<?=$FamilyMember?>');"
              class="allowAutomaticIncreases-<?=$FamilyMember?>"
              <?=(isset($Family->AutomaticPaymentIncreases[$FamilyMember]) && $Family->AutomaticPaymentIncreases[$FamilyMember] == "true") ?'checked="checked"' :'';?>
            /> Automatically increase recurrent payments at the start of each year to automatically meet fee commitments. <br/>
            <small><strong>Note:</strong> Fees may increase each year based on year level and CPI inflation. This may require you to review and increase your recurrent payment at the start of each year. You can call and change automatic increase payments at anytime but contacting the schools accounts department.</small>
          </div>
        </p>
      </div>
      <!-- Details: how to get the money to us.-->
      <h4 style="margin-top: 30px;">Details</h4>
      <div class="box <?=$FamilyMember?>-payment-details">
        <div>
          <?php
            //not referencing $this since it causes some session sifting bugs and rendering issues.
            $Sunrise = new Sunrise;
            $Sunrise->Render('payment-forms/'.$Family->PaymentMethod[$FamilyMember].'.form', [

            ], '..', false, [
              'FamilyMember' => $FamilyMember
            ]);
          ?>
        </div>
      </div>
    </form>
    <hr style="border-bottom: solid lightgrey 1px; margin-bottom: 25px; margin-top: 25px;" />
  <?php } endforeach; ?>



  <div class="next-selector">
    <div class="right">
      <button href="fee-information" class="load back btn btn-primary btn-left">Back</button><button href="gengov-information" class="load fwd btn btn-primary btn-right">Next</button>
    </div>
    <div class="clear"></div>
  </div>
