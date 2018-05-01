<div class="box title">
  <h2 style="margin: 0;">
    Parents and Guardians
  </h2>
</div>

<div>
  <div id="parent-guardians-container">

  </div>
</div>

<div class="box" style="margin-bottom: 30px;">
  <button
  type="button"
  onclick="window.fn.new.form('parent-guardians');"
  style="float: left;"
  class="nice-button green"
  >ADD PARENT/GUARDIAN</button>
  <button
    onclick="window.fn.validate.inputs($('.parent-guardian-form'), 'students');"
    type="button"
    style="float: right;"
    class="nice-button"
  >NEXT</button>
  <div style="clear: both;"></div>
</div>

<script>
  /* Parent-Guardians.js starter to load in parents.*/
  PG_init_loadin();
</script>
