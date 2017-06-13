<?php
  Router::get('/', function($Sunrise){
    $Sunrise->Render('Form.serve', [
      'studentSelectionList' => $Sunrise->Mini('form-areas/custom/StudentSelectionList')
    ]);
  });
