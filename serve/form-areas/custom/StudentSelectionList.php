<?php if (isset($_SESSION['form']['students'])) foreach ($_SESSION['form']['students'] as $Student): ?>
  <li><?=$Student['firstName']?> <?=$Student['middleName'][0]?>. <?=$Student['lastName']?></li>
<?php endforeach; ?>
