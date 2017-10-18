<?php
  $Authentication = [

      'save' => function($Sunrise, $api) {
          $post   = (Object) $_POST;
          $saveto = $post->saveto;

          if (!isset($post->name, $post->value) || empty($post->name)) $api->Error('Oops, we didn\'t recieve all the correct data...');
          $id = $post->id;

          $die = false;
          $Object = &$api->find_object($id, $die, $saveto);
          $Object['data'][$post->name] = $post->value;
      },

      'delete' => function($Sunrise, $api) {
          $post = (Object) $_POST;
          $type = $post->objtype;
          $id   = $post->id;

          $sessid = $api->find_object_id($id, $type);
          if ($sessid !== false) {
            unset($_SESSION[ $api->conversion_s[$type] ][$sessid]);
            $api->json([
              'id' => $id
            ]);
          }

      }

  ];
