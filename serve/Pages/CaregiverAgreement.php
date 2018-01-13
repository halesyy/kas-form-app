<div class="box title">
  <h2 style="margin: 0;">
    Caregiver Agreement
  </h2>
</div>

<div class="box" style="padding-left: 10px;">
  <ol>
    <li>We/I hearby make an application for our/my child to be enrolled at KAS and understand that the completion
of the application does not guarantee a position at KAS.</li>
    <li>We/I understand that our/my child is only admitted to KAS subject to his/her application being processed
and accepted by the Kempsey Adventist School Council. If accepted we/I understand that our child will be
welcome at the school as long as the Kempsey Adventist School Council is satisfied that he/she upholds the
standards of the moral and behavioural conduct expected of students.</li>
    <li>We/I will support the Christian ethos of KAS in every way. Further, we/I will ensure that, in after-hours
meetings of school students under our jurisdiction or organised by us, the Christian principles and moral standards
of KAS will be upheld at all times.</li>
    <li>We/I understand and agree that our child must abide by current KAS rules as interpreted by the school, and
the continued attendance at the school is at the absolute discretion of the Kempsey Adventist School Council and
School Administration.</li>
    <li>We/I agree to be jointly and severally liable for the payment of all fees and charges levied by Kempsey
Adventist School (namely the Seventh-day Adventist Schools (NNSW) Limited trading as Kempsey Adventist
School) and agree that all amounts not paid by the due date may incur interest.</li>
    <li>We/I have read and accepted the conditions of enrolment and that to the best of our/my knowledge, all the
information provided on this application is true and correct.</li>
    <li>We/I understand that KAS has permission to take photographs and video of our/my child to be used for
marketing purposes unless a signed letter from the parent/guardian is submitted to KAS stating otherwise.</li>
    <li>We/I understand that KAS will communicate with parent's/guardian's via multiple forms of communication
including phone, letter, email, facebook and sms.</li>



  </ol>
</div>

<div class="box title" style="margin-top: 30px;">
  <h2 style="margin: 0;">
    Caregiver Signatures
  </h2>
</div>

  <?php foreach ($_SESSION['parents'] as $parent): $data = $parent['data']; ?>
    <div class="box" style="margin-top: 30px;">
      <h3>
        <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
        <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
        <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>
      </h4>

      <div class="row formation" style="margin: 10px 0 0 0;">
        <div class="col-lg-6 col-sm-12 col">
          <input type="text" class="connected-left" placeholder="(signature)" />
        </div>
        <div class="col-lg-6 col-sm-12 col">
          <input type="date" class="connected-right" />

        </div>
      </div>
    </div>
  <?php endforeach; ?>


  <div class="box" style="margin-top: 30px; margin-bottom: 30px;">
    <button
      type="button"
      onclick="window.location.href = '/#government-information'"
      style="float: left; margin-right: 15px;"
      class="nice-button"
    >BACK</button>

    <button
      onclick="w = window.open('print/index.php'); w.print();"
      type="button"
      style="float: right;"
      class="nice-button"
    >PRINT</button>
    <div style="clear: both;"></div>
  </div>
