<?php if (isset($_SESSION['form']['students'])) foreach ($_SESSION['form']['students'] as $index => &$Student):
$Student = unserialize($Student); ?>
  <li>
    <span>
      <?=$Student->Get('Personal', ['fname'])?>
      <?=($Student->Get('Personal', ['mname']) === false || $Student->Get('Personal', ['mname']) === '')? '': "{$Student->Get('Personal', ['mname'])[0]}.";?>
      <?=$Student->Get('Personal', ['lname'])?>
    </span>
    <span class="change-buttons" style="float: right;">
      <a class="edit-student" data-student-id="<?=$index?>">edit</a>
      <a class="delete-student" data-student-id="<?=$index?>">&times;</a>
    </span>
  </li>
<?php $Student = serialize($Student);
endforeach; ?>
