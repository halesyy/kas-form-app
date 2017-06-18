<?php
  $Serve = [
    'enrolment-information' => function($Sunrise) {
      $Sunrise->Render('form-areas/EnrolmentInformation.form', [

      ], '..');
    },
    'students' => function($Sunrise) {
      $Sunrise->Render('form-areas/Students.form', [
        'studentSelectionList' => $Sunrise->Mini('form-areas/custom/StudentSelectionList', '..')
      ], '..');
    },
    'family-details' => function($Sunrise) {
      $Sunrise->Render('form-areas/Parents.form', [
        
      ], '..');
    }
  ];
