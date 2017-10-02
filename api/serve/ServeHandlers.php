<?php
  //URL: /api/get/$ServeKey

  $Serve = [
    'form.cashpayment' => function($Sunrise) {
      $Sunrise->Render("payment-forms/cashpayment.form", [
      ], '..', [], [
        'FamilyMember' => Router::Fourth()
      ]);
    },
    'form.creditcard'=> function($Sunrise) {
      $Sunrise->Render("payment-forms/creditcard.form", [
      ], '..', [], [
        'FamilyMember' => Router::Fourth()
      ]);
    },
    'form.directdebit'=> function($Sunrise) {
      $Sunrise->Render("payment-forms/directdebit.form", [
      ], '..', [], [
        'FamilyMember' => Router::Fourth()
      ]);
    },
    'form.centrelink'=> function($Sunrise) {
      $Sunrise->Render("payment-forms/centrelink.form", [
      ], '..', [], [
        'FamilyMember' => Router::Fourth()
      ]);
    },
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
    'fee-information' => function($Sunrise) {
      $Sunrise->Render('form-areas/Fee.form', [], '..');
    },
    'fee-payment' => function($Sunrise) {
      $Sunrise->Render('form-areas/Payment.form', [], '..');
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
        if (is_numeric(Router::Fifth())) {
          $StudentID = Router::Fifth();
          $Sunrise->Render('form-areas/'.$Filename, [], '..', [
            'Student' => unserialize($_SESSION['form']['students'][$StudentID]),
            'StudentID' => $StudentID
          ]);
        } else {
          // Else doing other comparison which is a family to be edited.
          $Sunrise->Render('form-areas/'.$Filename, [], '..', [
            'Family' => unserialize($_SESSION['form']['families'][0]),
            'FamilyID' => 0
          ]);
        }
      }
    }
  ];
