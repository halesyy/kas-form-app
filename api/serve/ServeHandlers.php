<?php
  //URL: /api/get/$ServeKey

  $Serve = [

      'parent-guardians' => function($Sunrise) {

          $Sunrise->Render('Pages/Parent_Guardians', [

          ], '..');

      },

      'students' => function($Sunrise) {

          $Sunrise->Render('Pages/Students', [

          ], '..');

      },

      'worker-group-numbers' => function($Sunrise) {

        $Sunrise->Render('Pages/WorkerGroupNumbers', [

        ], '..');

      },

      'fees' => function($Sunrise) {

            print $Sunrise->Mini('Pages/Fees', '..', [
              'MoneyBags' => new MoneyBags($_SESSION['students'])
            ]);


      },

      'government-information' => function($Sunrise) {

        print $Sunrise->Mini('Pages/GovernmentInformation', '..', [

        ]);

      },

      'caregiver-agreement' => function($Sunrise) {

        print $Sunrise->Mini('Pages/CaregiverAgreement', '..', [

        ]);

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
