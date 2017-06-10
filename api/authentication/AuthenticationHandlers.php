<?php
  $Authentication = [
    'NewStudent' => function($Sunrise, $API) {
      $Sanitize = $API->Sanitize('formData', [
        'fname', 'lname'
      ])->Types([
        'string', 'string'
      ]);
      array_push($_SESSION['form']['students'], [
        'firstName' => $Sanitize['fname'],
        'lastName'  => $Sanitize['lname']
      ]);
    }
  ];
