<div>
  <?php foreach ($_SESSION['form']['students'] as $studentArray): ?>
    <h2><?=$studentArray['firstName']?> <?=$studentArray['lastName']?></h2>
  <?php endforeach; ?>
</div>
