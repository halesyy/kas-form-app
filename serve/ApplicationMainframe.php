<?php // This is the SPA (single-page-application) introduction, allowing itself to instansiate and start getting its roots in the HTML5 API. ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Design | Kempsey Adventist School</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.min.css" defer="defer" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto|Proxima+Nova" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="public/js/functions.js" defer></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="container-fluid" id="nav-container">
        <nav id="nav" class="header-navigation">

          <!--
        || List of each point data:
        || 1. Parents / Guardians
        || 2. Family Details
        || 3. Student
        || 4. Student Profile
        || 5. Documentation
        || 6. Terms
           -->
          <div class="point selected parent-guardians">
            <div class="ball"><div class="ball-num">1</div></div>
            <div class="title">Parent / Guardians</div>
          </div>
          <div class="connection"></div>
          <div class="point students">
            <div class="ball"><div class="ball-num">2</div></div>
            <div class="title">Students</div>
          </div>
          <div class="connection"></div>
          <div class="point fees">
            <div class="ball"><div class="ball-num">3</div></div>
            <div class="title">Fees</div>
          </div>
          <div class="connection"></div>
          <div class="point residence-and-contact">
            <div class="ball"><div class="ball-num">4</div></div>
            <div class="title">Residence and Contact</div>
          </div>
          <div class="connection"></div>
          <div class="point caregiver-agreement">
            <div class="ball"><div class="ball-num">5</div></div>
            <div class="title">Caregiver Agreement</div>
          </div>
          <div style="clear: both;"></div>

        </nav>
      </div>
      <div class="container">
        <div class="row">
          <div id="content" class="col-12">
            <div class="row align-items-start">
              <div id="information-snappet" class="col-lg-4 col-md-4 col-sm-4 hidden-xs-down no">
                <div id="welcome">
                  <div class="header-image image"></div>
                  <h2 class="gold webpage-title" style="padding: 20px 20px 0 20px; text-align: center;"></h2>
                  <div class="welcome"></div>
                </div>
              </div>
              <div id="form-fill" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no">
                <div id="placer">

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
  <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="public/css/external_modules/bootox.min.js"></script>

  <script src="public/js/controller.js" defer></script>
  <script src="public/js/parent-guardians.js" defer></script>
  <script src="public/js/students.js" defer></script>
</html>
