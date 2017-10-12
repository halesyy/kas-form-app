<?php $Family = unserialize($_SESSION['form']['families'][0]); $Family->Fees(); ?>

  <h3 style="margin-top: 20px;"><span>Per-Student Costs</span></h3>
  <?php $Family->PreviewBaseFeeCosts(); ?>
  <div class="clear"></div>

  <!-- <h3 style="margin-top: 20px;"><span>Pricing</span></h3> -->
  <!--BUILDING LEVY-->
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
      <span title="Static base cost for a family to be enrolled per year.">Building Levy</span>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center">
      $<?=number_format( $Family->Totals['BuildingLevy'] )?>
    </div>
  </div>
  <hr style="border-bottom: solid lightgrey 1px; margin-top: 10px; margin-bottom: 10px;" />
  <!--TOTAL ANNUAL FEES-->
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
      <strong title="The total price for families students accounting to the terms left in the year.">Annual Cost</strong>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center">
      $<?=number_format( $Family->Totals['TotalAnnualPrice'] )?>
    </div>
  </div>
  <hr style="border-bottom: solid lightgrey 1px; margin-top: 10px; margin-bottom: 10px;" />

  <!--DISCOUNTS-->
  <div class="row" style="margin-top: 10px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <strong title="The removed price from payment from family, employee and scholership's.">Discounts</strong>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-left: 50px;">
      <strong title="Discount from having more than one student in family.">Family Discount</strong>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center">
      <?=(array_sum($Family->DiscountTotals['family']) == 0)? '': '$('.number_format($Family->TermsLeft* array_sum($Family->DiscountTotals['family']) /4, 2 ).')';?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-left: 50px;">
      <strong title="Discount for paying upfront or termly.">Prompt Payment Discount</strong>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center">
      <?=(array_sum($Family->DiscountTotals['promtpayment']) == 0)? '': '$('.number_format(array_sum($Family->DiscountTotals['promtpayment']), 2 ).')';?>
    </div>
  </div>
  <div class="clear"></div>
  <hr style="border-bottom: solid lightgrey 1px; margin-top: 10px; margin-bottom: 10px;" />

  <!--AFTER DISCOUNTS, DISPLAY MORE DATA FOR PROMT PAYMENTS-->
  <!--TOTALS-->
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
      <strong title="Total fee price after discounts.">Total</strong>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center bold">
      $<?=number_format($Family->Totals['FullAnnualPriceLessDiscounts'], 2)?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
      <span title="Progress through year removed from cost for family.">Less days not attended this year</span>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center">
      $(<?=number_format($Family->Totals['LessDaysNotAttendedThisYear'], 2)?>)
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
      <strong title="Total fee price for family.">Total fees for this year</strong>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center bold">
      $<?=number_format($Family->Totals['TotalAfterLessDays'], 2)?>
    </div>
  </div>

  <div style="margin-bottom: 50px;"></div>






  <!-- Going to find out the family member who's gonna pay. This has been a great addition of Jacks useless comments pt 5. -->
  <form class="kasform">
    <h3 style="border-bottom: 0;">Payment Responsibilities</h3>
    <div style="margin-top: 30px;">

      <div class="box" style="border-bottom: 0; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
        <?php if (!empty($Family->Get('Mother', ['fname'])) && !empty($Family->Get('Mother', ['lname']))): ?>
          <input
            type="checkbox"
            onclick="window.SetResponsibility('mother', this);"
            id="motherPayingForFees"
            <?php if (isset($Family->PaymentResponsibilities['mother']) && $Family->PaymentResponsibilities['mother'] == "true") echo "checked='checked'"; ?>
          /> Mother <br/>
        <?php endif; ?>

        <?php if (!empty($Family->Get('Father', ['fname'])) && !empty($Family->Get('Father', ['lname']))): ?>
          <input
            type="checkbox"
            onclick="window.SetResponsibility('father', this);"
            id="fatherPayingForFees"
            <?php if (isset($Family->PaymentResponsibilities['father']) && $Family->PaymentResponsibilities['father'] == "true") echo "checked='checked'"; ?>
          /> Father <br/>
        <?php endif; ?>

        <?php if (!empty($Family->Get('Guardian', ['fname'])) && !empty($Family->Get('Guardian', ['lname']))): ?>
          <input
            type="checkbox"
            onclick="window.SetResponsibility('guardian', this);"
            id="guardianPayingForFees"
            <?php if (isset($Family->PaymentResponsibilities['guardian']) && $Family->PaymentResponsibilities['guardian'] == "true") echo "checked='checked'"; ?>
          /> Guardian <br/>
        <?php endif; ?>

        <input
          type="checkbox"
          onclick="window.OtherPayingForFeesManage(this); window.SetResponsibility('other', this);"
          id="otherPayingForFees"
          <?php if (isset($Family->PaymentResponsibilities['other']) && $Family->PaymentResponsibilities['other'] == "true") echo "checked='checked'"; ?>
        /> Other <br />
      </div>


      <div id="OtherGuardianCapture" class="box" style="padding: 0; border-top: 0; border-bottom: 0; border-radius: 0; display: <?=(isset($Family->PaymentResponsibilities['other']) && $Family->PaymentResponsibilities['other'] == "true")?"block":"none";?>;">
        <div class="row" style="background-color: lightgrey;">
          @half
            [label "Name*" for "otherName"]
            <input
              type="text"
              name="otherName"
              onkeyup="window.OtherInputsUpdate(this);"
              id="otherName"
              <?php if (isset($Family->OtherInformation['otherName'])) echo "value='{$Family->OtherInformation['otherName']}'" ?>
            />
          @half-connection
            [label "Relationship to Student*" for "otherRelationshipToStudent"]
            <input
              type="text"
              name="otherRelationshipToStudent"
              onkeyup="window.OtherInputsUpdate(this);"
              id="otherRelationshipToStudent"
              <?php if (isset($Family->OtherInformation['otherRelationshipToStudent'])) echo "value='{$Family->OtherInformation['otherRelationshipToStudent']}'" ?>
            />
          @third-connection
            [label "Address*" for "otherAddress"]
            <input
              type="text"
              name="otherAddress"
              onkeyup="window.OtherInputsUpdate(this);"
              id="otherAddress"
              <?php if (isset($Family->OtherInformation['otherAddress'])) echo "value='{$Family->OtherInformation['otherAddress']}'" ?>
            />
          @third-connection
            [label "Email*" for "otherEmail"]
            <input
              type="text"
              name="otherEmail"
              onkeyup="window.OtherInputsUpdate(this);"
              id="otherEmail"
              <?php if (isset($Family->OtherInformation['otherEmail'])) echo "value='{$Family->OtherInformation['otherEmail']}'" ?>
            />
          @third-connection
            [label "Phone Number*" for "otherPhoneNumber"]
            <input
              type="text"
              name="otherPhoneNumber"
              onkeyup="window.OtherInputsUpdate(this);"
              id="otherPhoneNumber"
              <?php if (isset($Family->OtherInformation['otherPhoneNumber'])) echo "value='{$Family->OtherInformation['otherPhoneNumber']}'" ?>
            />
          @//
        </div>
      </div>
      <!-- End of payment responsibilities. -->
    </div>




    <!-- Once information is given, display a list of splitting that can be done that's optional. -->
    <div id="splitPaymentsContainer" class="box" style="padding: 0; border-top: 0; border-top-left-radius: 0; border-top-right-radius: 0;">
      <?php if (count($Family->PaymentResponsibilities) > 0): ?>
        <div style="background-color: #c6c6c6;">

            <div class="row mother-splitting-payment" style="display:<?=(isset($Family->PaymentResponsibilities['mother']) && $Family->PaymentResponsibilities['mother'] == "true")?"block":"none";?>;">
              @third
                <p>Mother (<?=$Family->Get('Mother', ['fname'])?> <?=$Family->Get('Mother', ['lname'])?>)</p>
              @seventh-connection
                <input
                  type="number"
                  min="1" max="100"
                  style="width: 70px;"
                  onkeyup="window.UpdateFamilyMemberPercentage('mother', this);"
                  value="<?=(isset($Family->FamilySplitPercentages['mother']))? $Family->FamilySplitPercentages['mother']: '';?>"
                />%
              @//
            </div>
            <div class="row father-splitting-payment" style="display:<?=(isset($Family->PaymentResponsibilities['father']) && $Family->PaymentResponsibilities['father'] == "true")?"block":"none";?>;">
              @third
                <p>Father (<?=$Family->Get('Father', ['fname'])?> <?=$Family->Get('Father', ['lname'])?>)</p>
              @seventh-connection
                <input
                  type="number"
                  min="1" max="100"
                  style="width: 70px;"
                  onkeyup="window.UpdateFamilyMemberPercentage('father', this);"
                  value="<?=(isset($Family->FamilySplitPercentages['father']))? $Family->FamilySplitPercentages['father']: '';?>"
                />%
              @//
            </div>
            <div class="row guardian-splitting-payment" style="display:<?=(isset($Family->PaymentResponsibilities['guardian']) && $Family->PaymentResponsibilities['guardian'] == "true")?"block":"none";?>;">
              @third
                <p>Guardian (<?=$Family->Get('Guardian', ['fname'])?> <?=$Family->Get('Guardian', ['lname'])?>)</p>
              @seventh-connection
                <input
                  type="number"
                  min="1" max="100"
                  style="width: 70px;"
                  onkeyup="window.UpdateFamilyMemberPercentage('guardian', this);"
                  value="<?=(isset($Family->FamilySplitPercentages['guardian']))? $Family->FamilySplitPercentages['guardian']: '';?>"
                />%
              @//
            </div>
            <div class="row other-splitting-payment" style="display:<?=(isset($Family->PaymentResponsibilities['other']) && $Family->PaymentResponsibilities['other'] == "true")?"block":"none";?>;">
              @third
                <p>Other</p>
              @seventh-connection
                <input
                  type="number"
                  min="1" max="100"
                  style="width: 70px;"
                  onkeyup="window.UpdateFamilyMemberPercentage('other', this);"
                  value="<?=(isset($Family->FamilySplitPercentages['other']))? $Family->FamilySplitPercentages['other']: '';?>"
                />%
              @//
            </div>
            <div id="returnCombinationErrorMessage" style="display: <?=($Family->TotalFamilyPayPercentage() == 100)? "none": "block";?>; padding: 15px; color: #a94442; background-color: #f2dede; border: solid #ebccd1 1px;">
              <div class="alert alert-danger" role="alert">
                Percentages don't total to 100%!
              </div>
            </div>
        </div>
      <?php endif; ?>
    </div>



    <!--Payment plan: how often payments will work-->
    <h4 style="margin-top: 30px;">Payment Plan</h4>
    <div class="box">
      <input
        type="radio"
        name="paymentInterval"
        value="UpfrontYear"
        onclick="window.SetPaymentInterval('annually')"
        <?php if ($Family->Interval == 'annually') echo 'checked="checked"'; ?>
      />
      <b>$<?=number_format($Family->Totals['TotalCostAfterAnnualPromptPayment'], 2)?></b> Upfront Annual payment (10% prompt payment discount on tuition) <br/>


      <input
        type="radio"
        name="paymentInterval"
        value="UpfrontTerm"
        onclick="window.SetPaymentInterval('termly')"
        <?php if ($Family->Interval == 'termly') echo 'checked="checked"'; ?>
      />
      <b>$<?=number_format($Family->Totals['TotalCostAfterTermlyPromptPayment'], 2)?></b> Upfront term payment (5% prompt payment discount on tuition) <br/>


      <input
        type="radio"
        name="paymentInterval"
        value="UpfrontFortnightly"
        onclick="window.SetPaymentInterval('fortnightly')"
        <?php if ($Family->Interval == 'fortnightly') echo 'checked="checked"'; ?>
      />
      <b>$<?=number_format($Family->Totals['FortnightlyPayments'], 2)?></b> Recurrent fortnightly payments
    </div>




  </form>
  <!-- Splitting of fees is done, we can now finish the financial information loading. -->
