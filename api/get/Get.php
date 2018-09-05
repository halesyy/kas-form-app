<?php
  //URL: /api/get/$ServeKey

  $Serve = [

      'parent-guardians' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/Parent_Guardians', '..', []);
          $Details = [
            'title' => 'Step 1: Parent and Guardian Information',
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'family-fee-split' => function($Sunrise, $api) {

        $total = [];
        foreach ($_SESSION['parents'] as $id => $parent) {
          // print_r($parent['data']);
          if (isset($parent['data']['fee-split']))
          array_push($total, $parent['data']['fee-split']);
          else {
            $_SESSION['parents'][$id]['data']['fee-split'] = 100;
            array_push($total, 100);
          }
        }
        $return = (round(array_sum($total)) == 100 || round(array_sum($total)) == ((count($_SESSION['parents']) * 100)) )? true: false;
        print json_encode(['success' => $return]);

      },

      'students' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/Students', '..', []);
          $Details = [
            'title' => 'Step 2: Student Information',
            'description' => "<p>Please provide us with the details of each of the children being enrolled as part of this application.</p><p>Additional children can be added by clicking on the  “Add Child” button at the bottom of this page.</p><p>Including all children under a single application will automatically enable family discount entitlements.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'residence-and-contact' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/ResidenceAndContact', '..', []);
          $Details = [
            'title' => 'Step 4: Residence and Emergency Contacts',
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
            'title' => 'Step 3: Fees',
            'description' => "<p>The following is an outline of the School fees by year as well as an estimate of the total fees payable based on the children that have been included in this enrolment application.</p><p>Please provide us with the details of who will be responsible for the payment of school fees and any other associated costs.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'government-information' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/GovernmentInformation', '..', []);
          $Details = [
            'title' => 'PAGE TITLE',
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => '<div class="box formation">This page is deprecated.</div>'
          ];
          $api->JSON($Details);

      },

      'caregiver-agreement' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/CaregiverAgreement', '..', []);
          $Details = [
            'title' => 'Step 5: Parent/Guardian Agreement',
            'description' => "<p>The following outlines the terms and conditions as they relate to the enrolment of the children included in this application.</p>",
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

      // /api/get/fillout{ student/parent-guardians }
      // Providing form to be filled out.
      'fillout' => function($Sunrise, $api) {
        if (!in_array(Router::Fourth(), array_keys($api->conversion_s))) $api->error('Reference not in converter as key.');
        else $type = Router::Fourth();
        // Type = students, parents, getting the reference for the
        // object creation.

        if (count($_SESSION[ $api->conversion_s[$type] ]) != 0) {
          $forms = []; $count = 1;
          foreach ($_SESSION[ $api->conversion_s[$type] ] as $index => $Object) {
            array_push($forms, [
              'id'   => $Object['id'],
              'index' => $index,
              'body' => $Sunrise->Mini("FormComponents/{$api->conversion_f[$type]}", '..', [
                'id' => $Object['id'],
                'index' => $index,
                'data' => $Object['data'],
                'first' => ($count == 1)?true: false
              ])
            ]);
            $count++;
          }
          $api->JSON([ 'forms' => $forms]);
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

      'new' => function($Sunrise, $api) {
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
