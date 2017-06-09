<?php
  Router::get('/', function(){
    return ['Form.serve', [
      'name' => 'jack hales'
    ]];
  });
