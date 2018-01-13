<?php session_start(); ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>Print | Kempsey Adventist School</title>

      <link rel="stylesheet" type="text/css" href="/public/css/print.min.css" />

      <?php require_once "../application/modules/_SP_Manipulation.php"; ?>
      <?php require_once "../application/modules/MoneyBags.php"; ?>
      <?php $MoneyBags = new MoneyBags; ?>
    </head>
    <body>

      <div class="dedicated">
        <div id="header-image-container">
          <img id="header-reference" src="/public/images/HeaderKasImage.png" />
          <img id="header-qr-code" src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=http://www.kfa.jekoder.com&choe=UTF-8" />
        </div>
        <hr />
      </div>

      <div class="dedicated">
        <h1 class="blue page-title ">Student Overview</h1>

        <?php foreach ($_SESSION['students'] as $student): $data = $student['data']; ?>

          <div class="box" style="margin-bottom: 20px;">
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
              <div class="col-3">
                <?php if (isset($data['date-of-birth'])): ?>
                  <?=$MoneyBags->AgeCalculator($data['date-of-birth'])?>
                <?php else: ?>
                  N/A
                <?php endif; ?>
              </div>
              <div class="col-3">
                <strong>Begins</strong>
              </div>
              <div class="col-3">
                <?=$data['year-starting']?>, year <?=$data['year-level']?>
              </div>
              <div class="clear"></div>
            </div>
          </div>

        <?php endforeach; ?>
      </div>

      <script>
        window.print();
      </script>

    </body>
  </html>
