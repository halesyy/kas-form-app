<?php if (isset($_SESSION['form']['students'])) { $Count = 0; foreach ($_SESSION['form']['students'] as $index => &$Student): $Student = unserialize($Student); ?>
  <?php if ($Count == 0): ?>
    <div class="row">
      @fourth-stable
        <div style="padding-left: 5px;">
          <strong>Name</strong>
        </div>
      @fourth-stable-connection
        <div class="center">
          <strong>Age</strong>
        </div>
      @fourth-stable-connection
        <div class="center">
          <strong>Year Level</strong>
        </div>
      @//
    </div>
  <?php endif; ?>
  <div class="row box">
    @fourth-stable
      <span>
        <?=$Student->Get('Personal', ['fname'])?>
        <?php if (!empty($Student->Get('Personal', ['mname']))) echo $Student->Get('Personal', ['mname']); ?>
        <?=$Student->Get('Personal', ['lname'])?>
      </span>
    @fourth-stable-connection
      <div class="center">
        <?=$Student->Age()?>
      </div>
    @fourth-stable-connection
      <div class="center">
        <?=$Student->Get('Personal', ['yearLevel'])?>
      </div>
    @fourth-stable-connection
      <span class="change-buttons" style="float: right;">
        <a class="edit-student" data-student-id="<?=$index?>">edit</a>
        <a class="delete-student" data-student-id="<?=$index?>">delete</a>
      </span>
    @//
  </div>
<?php $Student = serialize($Student); $Count++; endforeach; } ?>
