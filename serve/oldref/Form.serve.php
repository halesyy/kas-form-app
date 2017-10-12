<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registration | Kempsey Adventist School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico">
    <meta charset="UTF-8" />
    <style>body {background-color: #003f80;} .container {margin-top:20px; margin-bottom:20px; background-color:white;}</style>
    <!--Deffered documents.-->
    <link rel="stylesheet" type="text/css" href="/public/css/main.min.css" defer="defer" />
    <link href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans" rel="stylesheet" defer="defer" />
    <script src="/public/js/external_modules/Shortcuts.js" defer="defer"></script>
    <script src="/public/js/external_modules/jQueryAndUI.min.js" defer="defer"></script>
    <script src="/public/bstrap-small/bootstrap-smallest.min.js" defer="defer"></script>
    <script src="/public/js/watchers.js" defer="defer"></script>
    <script src="/public/js/external_modules/bootbox.min.js" defer="defer"></script>
  </head>
  <body>
    <div class="container" id="content-container">
      <div id="header">
        <div id="header-left" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <img src="/public/images/header-logo.png" height="180" alt="KAS Logo" />
        </div>
        <div id="header-right" class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
          <img src="/public/images/header-photo.jpg" height="180" alt="KAS Happy Family" />
        </div>
        <div class="clear"></div>
      </div>
      <div id="left" class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
        <div>
          <h3>Application for Enrolment</h3>
          <ul>
            <!-- <li style="margin-bottom: 10px;">
              <a href="/print/index.php" target="_print">Print your form</a>
            </li> -->
            <li><a class="noclick enrolment-information" onclick="event.preventDefault();">Enrolment Information</a>
            <li><a class="noclick students" onclick="event.preventDefault();">Students</a></li>
            <li><a class="noclick family-details" onclick="event.preventDefault();">Family Details</a></li>
            <li><a class="noclick fee-information" onclick="event.preventDefault();">Fee Information</a></li>
            <li><a class="noclick fee-payment" onclick="event.preventDefault();">Fee Payment</a></li>
            <li><a class="noclick gengov-information" onclick="event.preventDefault();">General/Gov. Information</a></li>
            <li><a class="noclick guardian-agreement" onclick="event.preventDefault();">Parent/Guardian Agreement</a></li>
          </ul>
        </div>
      </div>
      <div id="right" class="col-lg-10 col-md-9 col-sm-8 col-xs-7">
        <!--Where functions can be called to manage the dynamic modal so code
        is re-usable instead of spawning a bunch of modals.-->
        <div id="DynamicModal">
          <div class="modal" id="DynamicModalContainer">
            <div class="modal-content" id="DynamicModalBody">
            </div>
          </div>
        </div>
        <div id="right-place"><!--Where content is placed.--></div>
      </div>
    </div>
  </body>
</html>
