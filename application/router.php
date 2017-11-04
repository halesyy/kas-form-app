<?php
  Router::get('/', function($Sunrise){
      $Sunrise->Render('ApplicationMainframe', []);
  });
