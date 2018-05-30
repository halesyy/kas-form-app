<div class="box title">
  <h2 style="margin: 0;">
    Family Fees
  </h2>
</div>

<div class="box" style="margin-bottom: 30px;">
  <div class="fee-table-container"><table border="0" cellspacing="2" style="width: 100%;" class="fee-table"><tbody><tr class="dark"><td><strong>2017</strong></td><td colspan="2" align="center"><strong>Kindy - Year 6</strong></td><td colspan="2" align="center"><strong>Year 7 - 8</strong></td><td colspan="2" align="center"><strong>&nbsp;Year 9 - 10</strong></td><td colspan="2" align="center"><strong>Year 11</strong></td><td colspan="2" align="center"><strong>&nbsp;Year 12</strong></td></tr><tr><td><strong>&nbsp;</strong></td><td align="center">&nbsp;</td><td align="center"><p><strong>Per Year&nbsp;</strong></p></td><td align="center">&nbsp;</td><td align="center"><p><strong>Per Year&nbsp;</strong></p></td><td align="center">&nbsp;</td><td align="center"><p><strong>Per Year&nbsp;</strong></p></td><td align="center"><p>&nbsp;</p></td><td align="center"><p><strong>Per Year&nbsp;</strong></p></td><td align="center">&nbsp;</td><td align="center"><p><strong>Per Year</strong>&nbsp;</p></td></tr><tr class="light data"><td><strong>Tuition</strong>&nbsp;</td><td align="right">&nbsp;</td><td align="right"><p style="text-align:center">1,025</p></td><td align="right">&nbsp;</td><td align="right"><p style="text-align:center">1,025</p></td><td align="right" style="text-align:center">&nbsp;</td><td align="right"><p style="text-align:center">1,225</p></td><td align="right" style="text-align:center">&nbsp;</td><td align="right" style="text-align:center">1,330</td><td align="right" style="text-align:center">&nbsp;</td><td align="right"><p style="text-align:center">1,330</p></td></tr><tr class="data"><td><strong>Compulsory</strong>&nbsp;</td><td align="right">&nbsp;</td><td align="right"><p style="text-align:center">700</p></td><td align="right">&nbsp;</td><td align="right"><p style="text-align:center">715</p></td><td align="right" style="text-align:center">&nbsp;</td><td align="right"><p style="text-align:center">715</p></td><td align="right" style="text-align:center">&nbsp;</td><td align="right" style="text-align:center">740</td><td align="right" style="text-align:center">&nbsp;</td><td align="right"><p style="text-align:center">740</p></td></tr><tr class="light data"><td><strong><p>Subject</p></strong></td><td align="right"><p>&nbsp;</p></td><td align="right"><p>&nbsp;</p></td><td align="right">&nbsp;</td><td align="right"><p style="text-align:center">305</p></td><td align="right" style="text-align:center">&nbsp;</td><td align="right"><p style="text-align:center">475</p></td><td align="right" style="text-align:center">&nbsp;</td><td align="right"><p style="text-align:center">680</p></td><td align="right" style="text-align:center">&nbsp;</td><td align="right"><p style="text-align:center">680</p></td></tr><tr class="dark"><td><strong>Total</strong></td><td align="right">&nbsp;</td><td align="right" style="text-align:center"><strong>1,725</strong></td><td align="right">&nbsp;</td><td align="right" style="text-align:center"><strong>2,045</strong><br></td><td align="right" style="text-align:center">&nbsp;</td><td align="right" style="text-align:center"><strong>2,415</strong></td><td align="right" style="text-align:center">&nbsp;</td><td align="right" style="text-align:center"><strong>2,750</strong></td><td align="right" style="text-align:center">&nbsp;</td><td align="right" style="text-align:center"><strong>2,750</strong></td></tr></tbody></table></div>
  <p style="margin: 10px 0 0 0;">
    <small>In addition to the fees above, there is also a building levy of $180 per family, per year. School fees are reviewed and updated each year and published on the schools website. <i>Fees are subject to change each year and are provided here as an indicative estimate only.</i></small>
  </p>
</div>

<div>
  <div class="box" id="students-fees" style="margin-bottom: 30px;">
      <?php /*Financial error! Let's show them.*/ if (!$MoneyBags->no_error()): ?>
          <div class="box" style="margin-bottom: 30px;">
            <?php $MoneyBags->error() ?>
          </div>
      <?php /*No financial errors, print out the financial data!*/ else:
          $MoneyBags->Cycle_StudentFeeCost_Containers($this/*Sunrise*/);
          endif;
      ?>
      <div>
        <div id="analysis">
          <div class="row" style="margin-left: 0; margin-right: 0; font-size: 15px;">
              <div class="col-9 col">
                Building Levy
              </div>
              <div class="col-3 col">
                <span>
                  $<?= number_format($MoneyBags->building_levy) ?>
                </span>
              </div>
              <div class="col-9 col">
                Total termed cost
              </div>
              <div class="col-3 col">
                <span title="Total cost of enrolling students before discounts. Termed amount included (<?=number_format($MoneyBags->terms_remaining, 2, '.', '')?> term(s) remaining, only pay for them.)">
                  $<?= number_format($MoneyBags->base_termed_costings()) ?>
                </span>
              </div>
              <div style="margin-bottom: 40px;"></div>

              <div class="col-9 col">
                Family Discount
              </div>
              <div class="col-3 col">
                <span title="Discount for having more than one student under enrollment.">
                  $(<?=number_format($MoneyBags->family_discount())?>)
                </span>
              </div>
              <div style="margin-bottom: 40px;"></div>

              <div class="col-9 col" style="font-weight: bold;">
                Total after discounts
              </div>
              <div class="col-3 col" style="font-weight: bold;">
                <span>
                  $<?= number_format($MoneyBags->termed_total_after_discounts()) ?>
                </span>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="box formation">
  <h3 style="margin: 0;" class="gold">
    Fee Responsibility
  </h3>
</div>

<div class="box formation">
  <?php foreach ($_SESSION['parents'] as $id => $parent): ?>
    <div class="row" style="margin: 0; margin-top: 10px; width: 100%;">
      <div class="col-8 col">
        <input
          type="text"
          class="connected-left"
          disabled="disabled"
          value="<?=$parent['data']['first-name']?> <?=$parent['data']['last-name']?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="number"
          value="<?=(isset($parent['data']['fee-split']))?(Int) $parent['data']['fee-split']:'100'?>"
          class="connected-middle NUM_ADD_100"
          onkeyup="$.post('/api/post', {
            type: 'change-fee-split-percentage',
            percentage: this.value,
            id: '<?=$id?>'
          }, function(response){
            console.log(response);
          });"
        />
      </div>
      <div class="col-1 col" style="text-align: center;">
        <div class="boxed connected-right">
          %
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>















<div class="box" style="margin-bottom: 30px;">
  <button
  onclick="$.get('/api/get/family-fee-split', function(response){
    let json = JSON.parse(response);
    if (json.success === true) window.location.href = '/#residence-and-contact';
    else alert('The fee split does not round to 100%!' + response);
  });"
  type="button"
  style="float: right;"
  class="nice-button"
  >NEXT</button>
  <button
    type="button"
    onclick="window.location.href = '/#students'"
    style="margin-right: 15px; float: right;"
    class="nice-button"
  >BACK</button>

  <!-- <button
  type="button"
  onclick="window.fn.new.form('students');"
  style="float: right; margin-right: 10px;"
  class="nice-button green"
  >ADD STUDENT TO FAMILY</button> -->
  <div style="clear: both;"></div>
</div>

<script>
  /* Fees.js starter to load in students.*/
  // FS_init_loadin();
</script>
