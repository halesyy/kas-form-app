<?php session_start(); ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>Print | Kempsey Adventist School</title>

      <link rel="stylesheet" type="text/css" href="/public/css/print.min.css" />

      <?php require_once "../application/modules/_Auther.php"; ?>
      <?php require_once "../application/modules/_SP_Manipulation.php"; ?>
      <?php require_once "../application/modules/MoneyBags.php"; ?>
      <?php $MoneyBags = new MoneyBags($_SESSION['students']); ?>
      <?php $Auther    = new Auther; ?>
      <?php $govinf    = $_SESSION['government-information']; ?>
    </head>
    <body>

      <div class="dedicated">
        <div id="header-image-container">
          <img id="header-reference" src="/public/images/HeaderKasImage.png" />
          <img id="header-qr-code" src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=http://www.kfa.jekoder.com&choe=UTF-8" />
        </div>
        <hr />
      </div>

      <?php if ($Auther->Force($_SESSION) === false):?>
        <div>
          <h1 style="color: #c21f1f; text-align: center;">
            Missing data from form: <br/>
            <small><?=$Auther->needs?></small>
          </h1>
        </div>
        <script>window.print();</script>
      <?php die; endif; ?>


      <div style="margin-top: 10px;">
        <h1 class="blue page-title center" style="font-size: 34px; margin-top: 20px;">QUICK OVERVIEW</h1>

        <div class="students-wrapper">
          <?php foreach ($_SESSION['students'] as $student): $data = $student['data']; ?>

              <div class="box">
                <h2 class="gold" style="margin: 0; margin-bottom: 5px;">
                  <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
                  <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
                  <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>
                  <!-- <small style="font-size: 12px;" class="blue">(Year <?=$data['year-level']?>)</small> -->
                  <div style="float: right;">
                    <?php if (isset($data['suspended-expelled']) && $data['suspended-expelled'] == 'true'): ?>
                      <small style="color: #260202; font-size: 13px;">Previously Suspended / Expelled</small>
                    <?php endif; ?>
                  </div>
                </h2>
                <div>
                  <div class="col-3">
                    <strong>Age</strong>
                  </div>
                  <div class="col-3 center">
                    <?php if (isset($data['date-of-birth'])): ?>
                      <?=$MoneyBags->AgeCalculator($data['date-of-birth'])?>
                    <?php else: ?>
                      N/A
                    <?php endif; ?>
                  </div>
                  <div class="col-3">
                    <strong>Begins</strong>
                  </div>
                  <div class="col-3 center">
                    <?=$data['year-starting']?>, year <?=$data['year-level']?>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>

          <?php endforeach; ?>
        </div>

        <hr />

        <div class="guardians-wrapper" style="margin-top: 10px;">
          <?php foreach ($_SESSION['parents'] as $parent): $data = $parent['data']; ?>

              <div class="box">
                <h2 class="gold" style="margin: 0; margin-bottom: 5px;">
                  <span id="title-title"><?=(isset($data['title']))?$data['title']:""?></span>
                  <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
                  <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
                  <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>
                  <small style="font-size: 16px; color: black;"><?=(isset($data['email']))?'('.$data['email'].')':""?></small>
                </h2>
                <div>
                  <div class="col-3">
                    <strong>Contact</strong>
                  </div>
                  <div class="col-3 center">
                    <?=(isset($data['phone-number']))?$data['phone-number']:"N/A"?> <!--(<?=(isset($data['allow-sms']) && $data['allow-sms'] == 'yes')?"YES":"NO"?> SMS)-->
                  </div>
                  <div class="col-3">
                    <strong>Relationship</strong>
                  </div>
                  <div class="col-3 center">
                    <?=(isset($data['relationship-to-student']))?ucwords($data['relationship-to-student']):"N/A"?>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>

          <?php endforeach; ?>
        </div>

        <div class="end-total" style="bottom: 0; position: absolute; width: calc(100% - 40px); background-image: url(/public/images/striped_blue.png); background-repeat: repeat;">
          <div style="margin: 10px 10px 10px 10px; padding: 15px; background: white; border: solid #003f80 1px;">
            <div style="float: left; font-size: 22px;" class="blue">Total (Yearly)</div>
            <div style="float: right; font-size: 22px;" class="gold">
              <?php
                $YearTotal = $MoneyBags->termed_total_after_discounts();
                print "$".number_format($YearTotal);
              ?>
            </div>
            <div style="clear: both;">
          </div>
        </div>
      </div>





        <?php foreach ($_SESSION['students'] as $student): $data = $student['data']; ?>
          <div class="dedicated">


            <div class="wrapper box">
              <h1 class="gold" style="margin: 0; margin-bottom: 15px; font-size: 40px;">
                <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
                <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
                <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>
                <div style="float: right;">
                  <?php if (isset($data['suspended-expelled']) && $data['suspended-expelled'] == 'true'): ?>
                    <small style="color: #260202; font-size: 13px;">Previously Suspended / Expelled</small>
                  <?php endif; ?>
                </div>
              </h1>
              <h3 style="margin: 0; margin-bottom: 10px;" class="blue">GENERAL</h3>
              <div class="col-3"><strong>Year Level</strong></div>
              <div class="col-3"><?="{$data['year-level']} in {$data['year-starting']}"?></div>
              <div class="col-3"><strong>Age</strong></div>
              <div class="col-3">
                <?php if (isset($data['date-of-birth'])): ?>
                  <?=$MoneyBags->AgeCalculator($data['date-of-birth'])?> (<?=$data['date-of-birth']?>)
                <?php else: ?>
                  N/A
                <?php endif; ?>
              </div>
              <div style="clear: both;"></div>
            </div>



            <div class="wrapper box" style="margin-top: 10px;">
              <h3 style="margin: 0; margin-bottom: 10px;" class="blue">PAST-EDUCATION</h3>

              <div class="col-3">
                <strong>Previous School</strong>
              </div>
              <div class="col-3">
                <?=(isset($data['previous-school']))?$data['previous-school']:"N/A"?>
              </div>

              <?php if (isset($data['suspended-expelled']) && $data['suspended-expelled'] == 'true'): ?>
                <div style="clear: both;"></div>
                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                  <strong>Expelled / Suspended:</strong> <br/>
                  <?=$data['suspended-expelled-info']?>
                </div>
              <?php endif; ?>

              <div style="clear: both;"></div>
            </div>



            <div class="wrapper box" style="margin-top: 10px;">
              <h3 style="margin: 0; margin-bottom: 10px;" class="blue">MEDICAL INFORMATION</h3>

              <div class="col-6">
                <strong>Private health fund / ambulance</strong>
              </div>
              <div class="col-6">
                <?=(isset($data['has-health-fund']) && $data['has-health-fund'] == 'true')?"Yes":"No"?>
              </div>

              <?php if ($data['has-health-fund'] == 'true'): ?>
                <div style="clear: both;"></div>
                <div style="padding: 10px; background: lightgrey; border-radius: 4px; margin-top: 10px;">

                  <div class="col-12">
                    <div class="col-3">
                      <strong>Company <?="&"?> Member #</strong>
                    </div>
                    <div class="col-9">
                      <?=$data['has-health-fund-info']?>
                    </div>
                  </div>
                  <div style="clear: both;"></div>
                  <div class="col-12" style="margin-top: 5px;">
                    <div class="col-3">
                      <strong>Medicare Number</strong>
                    </div>
                    <div class="col-3">
                      <?=$data['medicare-number']?>
                    </div>
                    <div class="col-3">
                      <strong>Medicare Expiry</strong>
                    </div>
                    <div class="col-3">
                      <?=$data['medicare-expiry']?>
                    </div>
                  </div>
                  <div style="clear: both;"></div>
                </div>
              <?php endif; ?>
              <div style="clear: both;"></div>
            </div>



            <div class="wrapper box" style="margin-top: 10px;">
              <h3 style="margin: 0; margin-bottom: 10px;" class="blue">DOCTOR / CONDITIONS</h3>
              <hr style="margin-top: 10px;" />
              <div style="clear: both;"></div>
              <div class="col-6">
                <h4 class="gold center" style="margin: 0; margin-bottom: 10px; margin-top: 10px;">DOCTOR</h4>
                <div class="col-6"><strong>Doctor's Name</strong></div>
                <div class="col-6"><?=$data['doctors-name']?></div>
                <div class="col-6"><strong>Doctor's Phone</strong></div>
                <div class="col-6"><?=$data['doctors-phone']?></div>
                <div class="col-6"><strong>Immunised</strong></div>
                <div class="col-6"><?=($data['immunised'] === true)?"Yes":"No"?></div>
                <div class="col-6"><strong>Contacts</strong></div>
                <div class="col-6"><?=(isset($data['contacts']) && $data['contacts'] == "true")?"Yes":"No"?></div>
                <div class="col-6"><strong>Glasses</strong></div>
                <div class="col-6"><?=(isset($data['glasses']) && $data['glasses'] == "true")?"Yes":"No"?></div>
              </div>
              <div class="col-6">
                <h4 class="gold center" style="margin: 0; margin-bottom: 10px; margin-top: 10px;">CONDITIONS</h4>
                <div class="col-6"><strong>Asthma</strong></div>
                <div class="col-6"><?=(isset($data['asthma']) && $data['asthma'] == "true")?"Yes":"No"?></div>
                <div class="col-6"><strong>ADHD</strong></div>
                <div class="col-6"><?=(isset($data['adhd']) && $data['adhd'] == "true")?"Yes":"No"?></div>
                <div class="col-6"><strong>Diabetes</strong></div>
                <div class="col-6"><?=(isset($data['diabetes']) && $data['diabetes'] == "true")?"Yes":"No"?></div>
                <div class="col-6"><strong>Epilepsy</strong></div>
                <div class="col-6"><?=(isset($data['epilepsy']) && $data['epilepsy'] == "true")?"Yes":"No"?></div>
                <div class="col-6"><strong>Allergies</strong></div>
                <div class="col-6"><?=(isset($data['allergies']) && $data['allergies'] == "true")?"Yes":"No"?></div>
                <div class="col-6"><strong>Autism</strong></div>
                <div class="col-6"><?=(isset($data['autism']) && $data['autism'] == "true")?"Yes":"No"?></div>
                <div style="clear: both;"></div>
                <hr style="margin-top: 3px;" />
                <div class="col-6"><strong>Early Intervention</strong></div>
                <div class="col-6"><?=(isset($data['early-intervention']) && $data['early-intervention'] == "true")?"Yes":"No"?></div>
                <div style="clear: both;"></div>
                <div style="padding-top: 4px; padding-bottom: 4px;"><strong>Explain</strong> <br/><?=(isset($data['conditions-info']))?$data['conditions-info']:""?></div>
              </div>
              <div style="clear: both;"></div>
            </div>
          </div>
        <?php endforeach; ?>











        <div class="dedicated">
          <?php foreach ($_SESSION['parents'] as $parent): $data = $parent['data']; ?>

            <div class="wrapper box">
              <h1 class="gold" style="margin: 0; margin-bottom: 15px; font-size: 40px;">
                <span id="title-title"><?=$data['title']?>.</span>
                <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
                <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
                <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>
              </h1>

              <h3 style="margin: 0; margin-bottom: 10px;" class="blue">PARENT</h3>

              <div class="col-3"><strong>Email</strong></div><div class="col-3"><?=$data['email']?></div>
              <div class="col-3"><strong>Relationship to Student</strong></div><div class="col-3"><?=ucwords($data['relationship-to-student'])?></div>
              <div class="col-3"><strong>Relationship Status</strong></div><div class="col-9"><?=ucwords($data['relationship-status'])?></div>
              <div class="col-3"><strong>Phone Number</strong></div><div class="col-3"><?=$data['phone-number']?></div>
              <div class="col-3"><strong>Allow SMS</strong></div><div class="col-3"><?=($data['allow-sms'] == "yes")?"Yes":"No"?></div>
              <div style="clear: both;"></div>
              <hr style="width: 100%;" />
              <?php if (isset($data['home-number'])): ?>
                <div class="col-3"><strong>Home Number</strong></div><div class="col-3"><?=$data['home-number']?></div>
              <?php endif; ?>
              <?php if (isset($data['work-number'])): ?>
                <div class="col-3"><strong>Work Number</strong></div><div class="col-3"><?=$data['work-number']?></div>
              <?php endif; ?>
              <div style="clear: both;"></div>
              <hr style="width: 100%;" />
              <div class="col-3"><strong>Suburb</strong></div><div class="col-3"><?=$data['suburb']?></div>
              <div class="col-3"><strong>Address</strong></div><div class="col-3"><?=$data['address']?></div>


              <div style="clear: both;"></div>
          </div>
        <?php endforeach; ?>
      </div>









      <div class="dedicated">

        <h1 class="gold" style="font-size: 40px;">
          Commonwealth Government Information
        </h1>

        <div class="wrapper box">
          <strong>Stated Information:</strong>
          <p>
            The following information is required for the collection and reporting of information on student background characteristics in all government and non-government schools by all State, Territory and Commonwealth Education Ministers.
          </p>
          <p>
            All information which could identify or would reasonably identify individuals is removed from national reporting so that no personal information is reported publicly. Information collected from this form will be covered by Kempsey Adventist School’s Privacy Policy. A copy of this policy is available from the KAS office.
          </p>
          <p>
            NOTE: please only fill out appropriate information regarding student.
          </p>
        </div>

        <div class="wrapper box" style="margin-top: 10px;">
          <div class="col-6">
            <div class="col-12">
              <div class="col-6"><strong>Mother Highest Education</strong></div><div class="col-6"><?=$govinf['mother-highest-education']?></div>
            </div>
            <div style="clear: both;"></div>
            <hr />
            <div class="col-12">
              <div class="col-6"><strong>Mother Highest Qualification</strong></div><div class="col-6"><?=$govinf['mother-highest-qualification']?></div>
            </div>
            <div style="clear: both;"></div>
            <hr />
            <div class="col-12">
              <div class="col-6"><strong>Mother Most Spoken Language</strong></div><div class="col-6"><?=$govinf['mother-most-spoken-language']?></div>
            </div>
            <div style="clear: both;"></div>
            <hr />
            <div class="col-12">
              <div class="col-6"><strong>Mother Occupational Group</strong></div><div class="col-6"><?=$govinf['mother-occupational-group']?></div>
            </div>
            <div style="clear: both;"></div>
          </div>
          <div class="col-6">
            <div class="col-12">
              <div class="col-6"><strong>Father Highest Education</strong></div><div class="col-6"><?=$govinf['father-highest-education']?></div>
            </div>
            <div style="clear: both;"></div>
            <hr />
            <div class="col-12">
              <div class="col-6"><strong>Father Highest Qualification</strong></div><div class="col-6"><?=$govinf['father-highest-qualification']?></div>
            </div>
            <div style="clear: both;"></div>
            <hr />
            <div class="col-12">
              <div class="col-6"><strong>Father Most Spoken Language</strong></div><div class="col-6"><?=$govinf['father-most-spoken-language']?></div>
            </div>
            <div style="clear: both;"></div>
            <hr />
            <div class="col-12">
              <div class="col-6"><strong>Father Occupational Group</strong></div><div class="col-6"><?=$govinf['father-occupational-group']?></div>
            </div>
            <div style="clear: both;"></div>
          </div>
          <div style="clear: both;"></div>
        </div>





      </div>







      <script>
        window.print();
      </script>
    </body>
  </html>
