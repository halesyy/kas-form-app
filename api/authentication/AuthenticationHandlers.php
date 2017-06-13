<?php
  $Authentication = [
    'NewStudent' => function($Sunrise, $API) {
      $Sanitize = $API->Sanitize('formData', [
        'fname', 'lname', 'mname', 'pname', 'email', 'homephone', 'mobilephone', 'yeartoenrol', 'gender'
      ])->Types([
        'string'
      ]);
      $fullName = $API->CreateFullName($Sanitize['fname'], $Sanitize['mname'], $Sanitize['lname']);
      array_push($_SESSION['form']['students'], [
        'firstName' => $Sanitize['fname'],
        'lastName'  => $Sanitize['lname'],
        'middleName' => $Sanitize['mname'],
        'fullName' => $fullName
      ]);
      // Sending JSON response back.
      $API->JSON([
        'fullName' => $fullName
      ]);
    }
  ];
