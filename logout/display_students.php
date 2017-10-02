<?php
  session_start();
  // $dis = [
  //   'form' => [
  //     'students' => [$_SESSION['form']['students']]
  //   ]
  // ];

  foreach ($_SESSION['form']['students'] as $index => $StudentString) {
    $Store[$index] = $StudentString;
  }
  echo serialize($Store);
