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
      <?php //$Auther    = new Auther; ?>
      <?php //$govinf    = $_SESSION['government-information']; ?>
    </head>
    <body>

      <div class="dedicated">
        <div id="header-image-container" style="text-align: center;">
          <img id="header-reference" width="60%" src="/public/images/HeaderKasImage.png" />
        </div>
        <hr />
      </div>

      <?php // if ($Auther->Force($_SESSION) === false):?>
        <!--<div>
          <h1 style="color: #c21f1f; text-align: center;">
            Missing data from form: <br/>
            <small><?php //print $Auther->needs ?></small>
          </h1>
        </div>
        <script>window.print();</script> -->
      <?php // endif; ?>


      <div style="margin-top: 10px;">
        <h1 class="blue page-title center" style="font-size: 34px; margin-top: 20px;">QUICK OVERVIEW</h1>

        <h2 class="gold" style="margin: 0; margin-bottom: 10px;">Students</h2>
        <div class="students-wrapper">
          <?php foreach ($_SESSION['students'] as $student): $data = $student['data']; ?>

              <div class="box">
                <h2 class="gold" style="margin: 0; margin-bottom: 5px;">
                  <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
                  <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
                  <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>
                  <div style="float: right;">
                    <?php if (isset($data['suspended-expelled']) && $data['suspended-expelled'] == 'true'): ?>
                      <small style="color: #260202; font-size: 13px;">Previously Suspended / Expelled</small>
                    <?php endif; ?>
                  </div>
                </h2>
              </div>

          <?php endforeach; ?>
        </div>

        <hr style="width: 100%; margin-top: 25px; margin-bottom: 10px;" />

        <h2 class="gold" style="margin: 0; margin-top: 20px;">Parents</h2>
        <div class="guardians-wrapper" style="margin-top: 10px;">
          <?php foreach ($_SESSION['parents'] as $parent): $data = $parent['data']; ?>

              <div class="box">
                <h2 class="gold" style="margin: 0; margin-bottom: 5px;">
                  <span id="title-title"><?=(isset($data['title']))?$data['title']:""?></span>
                  <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
                  <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
                  <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>
                  <small style="font-size: 16px; color: black; float: right;"><?=(isset($data['email']))?'('.$data['email'].')':""?></small>
                </h2>
              </div>

          <?php endforeach; ?>
        </div>

        <div class="end-total" style="bottom: 0; position: absolute; width: calc(100% - 40px);">
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


      <!-- DEDICATED STUDENTS -->


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
              <div class="col-3"><strong>Gender</strong></div>
              <div class="col-3"><?=ucwords($data['gender'])?></div>
              <div class="col-6"><strong>Aboriginal / Torres Strait Is.</strong></div>
              <div class="col-6"><?=$data['is-aboriginal-or-torres-strait']?></div>
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
              <div class="col-3">
                <strong>Previous Year</strong>
              </div>
              <div class="col-3">
                <?=(isset($data['previous-year']))?$data['previous-year']:"N/A"?>
              </div>
              <?php if (isset($data['suspended-expelled']) && $data['suspended-expelled'] == 'yes'): ?>
                <div style="clear: both;"></div>
                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                  <strong>Expelled / Suspended:</strong> <br/>
                  <?=$data['suspended-expelled-info']?>
                </div>
              <?php endif; ?>

              <div style="clear: both;"></div>
            </div>


            <div class="wrapper box" style="margin-top: 10px;">
              <h3 style="margin: 0; margin-bottom: 10px;" class="blue">DEMOGRAPHIC BACKGROUND</h3>

              <div class="col-3"><strong>Country of Bitch</strong></div>
              <div class="col-3"><?=$data['country-of-birth']?></div>
              <div class="col-3"><strong>Nationality</strong></div>
              <div class="col-3"><?=$data['nationality']?></div>
              <div class="col-3"><strong>Language spoken at home</strong></div>
              <div class="col-3"><?=$data['language-spoken-at-home']?></div>
              <div class="col-3"><strong>Visa / Residence</strong></div>
              <div class="col-3"><?=$data['visa']?></div>
              <div class="col-3"><strong>Lives With</strong></div>
              <div class="col-3"><?=$data['lives-with']?></div>
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






        <!-- DEDICATED PARENTS -->




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
              <?php if (isset($data['home-number'])): ?>
                <hr style="width: 100%;" />
                <div class="col-3"><strong>Home Number</strong></div><div class="col-3"><?=$data['home-number']?></div>
              <?php endif; ?>
              <?php if (isset($data['work-number'])): ?>
                <div class="col-3"><strong>Work Number</strong></div><div class="col-3"><?=$data['work-number']?></div>
              <?php endif; ?>
              <div style="clear: both;"></div>
              <hr style="width: 100%;" />
              <div class="col-3"><strong>Suburb</strong></div><div class="col-3"><?=$data['suburb']?></div>
              <div class="col-3"><strong>Address</strong></div><div class="col-3"><?=$data['address']?></div>
              <hr style="width: 100%;" />
              <div style="width: 100%;">
                <div class="col-3"><strong>Occupation</strong></div>
                <div class="col-3"><?=$data['occupation']?></div>
                <div class="col-3"><strong>Employer</strong></div>
                <div class="col-3"><?=$data['employer']?></div>
                <div class="col-3"><strong>Religion</strong></div>
                <div class="col-3"><?=$data['religion']?></div>
                <div class="col-3"><strong>Place of Worship</strong></div>
                <div class="col-3"><?=$data['place-of-worship']?></div>
                <div style="clear: both;"></div>
              </div>
              <hr style="width: 100%;" />
              <div class="col-6"><strong>Fee Split</strong></div>
              <div class="col-6"><?=(isset($data['fee-split']))?$data['fee-split'].'%':'None';?></div>
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
        <?php foreach ($_SESSION['parents'] as $parent): $data = $parent['data']; ?>
          <div class="wrapper box" style="margin-top: 10px;">
            <h2 class="blue" style="margin: 0; margin-bottom: 20px;"><?=$data['first-name']?> <?=$data['last-name']?> (<?=ucwords($data['relationship-to-student'])?>)</h2>
            <div class="col-6"><strong>Highest Education</strong></div>
            <div class="col-6"><?=$data['highest-education']?></div>
            <div class="col-6"><strong>Highest Qualification</strong></div>
            <div class="col-6"><?=$data['highest-qualification']?></div>
            <div class="col-6"><strong>Most Spoken Language at Home</strong></div>
            <div class="col-6"><?=$data['most-spoken-lanugage']?></div>
            <div class="col-6"><strong>Occupational Group</strong></div>
            <div class="col-6"><?=$data['occupational-group']?></div>
            <div style="clear: both;"></div>
          </div>
        <?php endforeach; ?>
        <h2 class="gold" style="font-size: 40px;">
          Emergency Contact Information
        </h2>
        <h3 style="margin-bottom: 0;" class="gold">Person 1</h3>
        <div class="col-6"><strong>Name</strong></div>
        <div class="col-6"><?=(isset($_SESSION['emergency-contacts'][1]['name']))?$_SESSION['emergency-contacts'][1]['name']:"None";?></div>
        <div class="col-6"><strong>Telephone</strong></div>
        <div class="col-6"><?=(isset($_SESSION['emergency-contacts'][1]['telephone']))?$_SESSION['emergency-contacts'][1]['telephone']:"None";?></div>
        <div class="col-6"><strong>Relation to Students</strong></div>
        <div class="col-6"><?=(isset($_SESSION['emergency-contacts'][1]['relationship']))?$_SESSION['emergency-contacts'][1]['relationship']:"None";?></div>
        <hr style="width: 100%; margin-top: 20px;" />
        <h3 style="margin-bottom: 0;" class="gold">Person 1</h3>
        <div class="col-6"><strong>Name</strong></div>
        <div class="col-6"><?=(isset($_SESSION['emergency-contacts'][2]['name']))?$_SESSION['emergency-contacts'][2]['name']:"None";?></div>
        <div class="col-6"><strong>Telephone</strong></div>
        <div class="col-6"><?=(isset($_SESSION['emergency-contacts'][2]['telephone']))?$_SESSION['emergency-contacts'][2]['telephone']:"None";?></div>
        <div class="col-6"><strong>Relation to Students</strong></div>
        <div class="col-6"><?=(isset($_SESSION['emergency-contacts'][2]['relationship']))?$_SESSION['emergency-contacts'][2]['relationship']:"None";?></div>
      </div>


      <div class="dedicated">
        <h1 style="font-size: 60px; text-align: center; padding: 5px; padding-bottom: 15px; border-bottom: solid silver 2px;" class="gold">Signatures</h1>
        <?php foreach ($_SESSION['parents'] as $parent): $data = $parent['data']; ?>
          <div style="padding-bottom: 20px; border-bottom: solid silver 3px;">
            <h2 class="gold"><?=$data['first-name']?> <?=$data['last-name']?></h2>
          </div>
        <?php endforeach; ?>
      </div>




      <script>
        window.print();
      </script>
    </body>
  </html>
