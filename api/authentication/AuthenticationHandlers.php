<?php
  $Authentication = [

      'save' => function($Sunrise, $api) {
        $post   = (Object) $_POST;
        $saveto = $post->saveto;

        if (!isset($post->name, $post->value) || empty($post->name)) $api->Error('Oops, we didn\'t recieve all the correct data...');
        $id = $post->id;

        $Object = &$api->find_object($id, false, $saveto);
        $Object['data'][$post->name] = $post->value;
      }

  ];
