<?php
  $Serve = [
    'enrolment-information' => function($Sunrise) {
      $Sunrise->Render('form-areas/EnrolmentInformation.form', [

      ], '..');
    },
    'students' => function($Sunrise) {
      $Sunrise->Render('form-areas/Students.form', [
        'x' => 5
      ], '..');
    }
  ];
