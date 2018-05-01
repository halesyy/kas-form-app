<?php
  //URL: /api/get/$ServeKey

  $Serve = [

      'parent-guardians' => function($Sunrise, $api) {

          $Page = $Sunrise->Mini('Pages/Parent_Guardians', '..', []);
          $Details = [
            'description' => "<p>Please provide us with the details of the parents or the guardians of the children being enrolled.</p><p>Additional parent and guardian information can be added by clicking on the  “Add Parent/Guardian” button at bottom of this page.</p>",
            'page' => $Page
          ];
          $api->JSON($Details);

      },

      'students' => function($Sunrise) {

          $Page = $Sunrise->Mini('Pages/Students', '..', []);

      },

      'worker-group-numbers' => function($Sunrise) {

          $Page = $Sunrise->Mini('Pages/WorkerGroupNumbers', '..', []);

      },

      'fees' => function($Sunrise) {

          $Page = $Sunrise->Mini('Pages/Fees', '..', [
            'MoneyBags' => new MoneyBags($_SESSION['students'])
          ]);


      },

      'government-information' => function($Sunrise) {

          $Page = $Sunrise->Mini('Pages/GovernmentInformation', '..', []);

      },

      'caregiver-agreement' => function($Sunrise) {

          $Page = $Sunrise->Mini('Pages/CaregiverAgreement', '..', []);

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
