<?php
  //URL: /api/get/$ServeKey

  $Serve = [

      'parent-guardians' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/Parent_Guardians', '..', []);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'students' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/Students', '..', []);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => "<p>Please provide us with the details of each of the children being enrolled as part of this application.</p><p>Additional children can be added by clicking on the  “Add Child” button at the bottom of this page.</p><p>Including all children under a single application will automatically enable family discount entitlements.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'residence-and-contact' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/ResidenceAndContact', '..', []);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => 'Please provide us with the residence and emergency contact details for the children being enrolled as part of this application. If the children being enrolled as part of this application live in separate addresses, please provide us with the address for each child, the name of the person they live with and how this person is related to the child.',
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'worker-group-numbers' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/WorkerGroupNumbers', '..', []);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'fees' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/Fees', '..', ['MoneyBags' => new MoneyBags($_SESSION['students'])]);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'government-information' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/GovernmentInformation', '..', []);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'caregiver-agreement' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/CaregiverAgreement', '..', []);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },



      'change-choice-rac' => function($Sunrise, $api) {
        $choice = Router::Fourth();
        $_SESSION['change-choice-rac'] = $choice;
        print json_encode(['success' => true]);
      },

      'set-all-students-home' => function($Sunrise, $api) {
        $home = Router::Fourth();
        $_SESSION['all-students-live-with'] = $home;
        if ($home == 'none') { print json_encode(['success' => false]); die; }
        foreach ($_SESSION['students'] as $index => $student):
          $_SESSION['students'][$index]['data']['lives-with'] = urldecode($home);
        endforeach;
        print json_encode(['success' => true]);
      },

      'change-student-home' => function($Sunrise, $api) {
        $id = Router::Fourth();
        $home = Router::Fifth();
        if ($home == 'none') { print json_encode(['success' => true]); die; }
        $_SESSION['students'][$id]['data']['lives-width'] = urldecode($home);
        print json_encode(['success' => true]);
      }

  ];

  $Serve_Pieces = [

      'fillout' => function($Sunrise, $api) {
        #/api/get/fillout/{student/parent-guardians}
        if (!in_array(Router::Fourth(), array_keys($api->conversion_s))) $api->error('Reference not in converter as key.');
        else $type = Router::Fourth();

        if (count($_SESSION[ $api->conversion_s[$type] ]) != 0) {
          $forms = []; $count = 1;
          foreach ($_SESSION[ $api->conversion_s[$type] ] as $index => $Object) {
            array_push($forms, [
              'id'   => $Object['id'],
              'body' => $Sunrise->Mini("Page_Pieces/{$api->conversion_f[$type]}", '..', [
                'id' => $Object['id'],
                'data' => $Object['data'],
                'first' => ($count == 1)?true: false
              ])
            ]);
            $count++;
          }
          $api->JSON([ 'forms' => $forms ]);
        }

        else {
          $r = $api->create_new_object($Sunrise, $type);
          $api->JSON(['forms' => [
            [
              'id'   => $r['id'],
              'body' => $r['form']
            ]
          ]]);
        }
      },

      'new' => functioN($Sunrise, $api) {
        if (!in_array(Router::Fourth(), array_keys($api->conversion_s))) $api->error('Reference not in converter as key.');
        else $type = Router::Fourth();

        $r = $api->create_new_object($Sunrise, $type);
        $api->JSON([
          'forms' => [[
            'id'    => $r['id'],
            'body'  => $r['form']
          ]]
        ]);
      }



  ];

  $Serve = array_merge($Serve, $Serve_Pieces);
