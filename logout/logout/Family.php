<?php
  session_start();
  require_once "../application/modules/Family.php";
  require_once "../application/modules/Student.php";

  echo "<pre>", print_r($_SESSION) ,"</pre>";

  // To remove the Family part of the app and reset it.
  $_SESSION['form']['families'] = [];
  foreach ($_SESSION['form']['students'] as $index => $Student):
    if (!is_string($Student)) {
      $_SESSION['form']['students'][$index] = serialize($Student);
    }
  endforeach;

  foreach ($_SESSION['form']['students'] as $index => $Student):
    $Student = unserialize($Student); #/u
    $Student->SetFamily(false);
    $_SESSION['form']['students'][$index] = serialize($Student); #/s
  endforeach;

  echo "<pre>", print_r($_SESSION) ,"</pre>";
