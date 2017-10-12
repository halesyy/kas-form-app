<?php
  $Authentication = [

      'save-parent' => function($Sunrise, $api) {
        $post = (Object) $_POST;

        if (!isset($post->name, $post->value) || empty($post->name)) $api->Error('Oops, we didn\'t recieve all the correct data...');
        $id = $post->id;

        $parent = &$api->find_parent($id);
        $parent['data'][$post->name] = $post->value;
      }

  ];
