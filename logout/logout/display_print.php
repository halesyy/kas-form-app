<?php
  session_start();

  echo "<pre>", print_r($_SESSION) ,"</pre>";

  echo "<strong>session string:</strong> <br/>";
  echo serialize($_SESSION);
