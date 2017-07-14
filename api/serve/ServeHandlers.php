<?php
  $Serve = [
    'enrolment-information' => function($Sunrise) {
      $Sunrise->Render('form-areas/EnrolmentInformation.form', [], '..');
    },
    'students' => function($Sunrise) {
      $Sunrise->Render('form-areas/Students.form', [
        'studentSelectionList' => $Sunrise->Mini('form-areas/custom/StudentSelectionList', '..')
      ], '..');
    },
    'family-details' => function($Sunrise) {
      $Sunrise->Render('form-areas/Families.form', [], '..');
    },
    'modal' => function($Sunrise) {
      $Loader   = Router::Fourth();
      $Filename = "$Loader.form";
      if (Router::Fifth() === false) {
        // No id given in fifth slug to provide for editing. Just going
        // to supply a new blank form.
        $Sunrise->Render('form-areas/'.$Filename, [], '..', []);
      } else {
        // Id given in fifth slug supplying entry for student to edit.
        // Simply giving the rendering engine a Student object under
        // reference of Student triggers the engine to move into placement
        // mode and supply form with data.
        $StudentID = Router::Fifth();
        $Sunrise->Render('form-areas/'.$Filename, [], '..', [
          'Student' => unserialize($_SESSION['form']['students'][$StudentID]),
          'StudentID' => $StudentID
        ]);
      }
    }
  ];
