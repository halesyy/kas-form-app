<?php
  /*
  | P R I N T I N G!
  */

  session_start();
  ob_start();

  require_once "../application/modules/Sunrise.php";
  require_once "../application/modules/Family.php";
  require_once "../application/modules/Student.php";

  $Sunrise = new Sunrise;
  $Student = unserialize($_SESSION['form']['students'][0]);
  $Family  = unserialize($_SESSION['form']['families'][0]);
?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>Print | Kempsey Adventist School</title>
      <link rel="stylesheet" href="/public/css/main.min.css" type="text/css" />
      <link rel="stylesheet" href="/public/css/print.min.css" type="text/css" />

      <link rel="stylesheet" href="/public/css/main.min.css" type="text/css" media="print" />
      <link rel="stylesheet" href="/public/css/print.min.css" type="text/css" media="screen, projection" />
      <link rel="stylesheet" href="/public/css/print.min.css" type="text/css" media="print" />
    </head>
    <body>
      <div>
        <div id="header-image-container">
          <img id="header-reference" src="/public/images/HeaderKasImage.png" />
          <img id="header-qr-code" src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=http://www.kas-form-app.t.jekoder.com&choe=UTF-8" />
        </div>
        <hr />
        <h3><span>Student Overview</span></h3>

        <div class="row student-preview">
          <?php
            $StudentTemp = new Student;
            $StudentTemp->PreviewBetaDisplayCols();
            
            foreach ($Family->Students as $index => $Student):
              $Student = unserialize($Student);
              $Student->PreviewBeta();
            endforeach;
          ?>
        </div>

        <h3 style="padding-top: 10px;"><span>Family Overview</span></h3>
        <?php
          $Family->PreviewBeta();
          // Each display has PRINT-CSS that delegates each new printable-format as a new page in
          // print, so all elements rendered under here are personal-paged.
          foreach ($Family->Students as $index => $Student):
            $Student = unserialize($Student);
            $Sunrise->Render('printable-formats/Student.printable', [], '..', [
              'Student' => $Student
            ]);
          endforeach;
          // ..
          $Sunrise->Render('printable-formats/Family.printable', [], '..', [
            'Family' => $Family
          ]);
        ?>
        <div class="print-page-dedicated">
          <h3 style="padding-top: 10px;">Signature Page</h3>
          <br/>
          <hr style="border-bottom: solid lightgrey 1px;" />
        </div>
      </div>
      <script>
        window.print();
      </script>
    </body>
  </html>
<?php
  ob_flush();
?>
