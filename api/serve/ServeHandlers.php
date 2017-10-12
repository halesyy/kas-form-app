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

      }

  ];

  $Serve_Pieces = [

      'parent-guardians-fillout' => function($Sunrise, $api) {
        if (count($_SESSION['parents']) != 0) {
          # returning the JSON of [{id:unique_tag, body:html}]
          $forms = [];
          foreach ($_SESSION['parents'] as $index => $Parent) {
            array_push($forms, [
              'id'   => $Parent['id'],
              'body' => $Sunrise->Mini('Page_Pieces/Parent_Guardians_Form', '..', [
                'id' => $Parent['id'],
                'data' => $Parent['data']
              ])
            ]);
          }
          $api->JSON([
            'forms' => $forms
          ]);
        }
        else {
          # creating a new form to fill out - initialization
          $r = $api->get_new_parent($Sunrise);
          $api->JSON([
            'forms' => [[
              'id' => $r['id'],
              'body' => $r['form']
            ]]
          ]);
        }

      },







      'new-parent' => function($Sunrise, $api) {
        $r = $api->get_new_parent($Sunrise);
        $api->JSON([
          'forms' => [[
            'id'   => $r['id'],
            'body' => $r['form']
          ]]
        ]);
      }

  ];

  $Serve = array_merge($Serve, $Serve_Pieces);
