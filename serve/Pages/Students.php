<div class="box title">
  <h2 style="margin: 0;">
    Students
  </h2>
</div>

<div>
  <div id="students-container">

  </div>
</div>

<div class="box" style="margin-bottom: 30px;">
  <button
    type="button"
    onclick="window.fn.new.form('students');"
    style="float: left;"
    class="nice-button green"
  >ADD STUDENT</button>

  <button
    onclick="window.fn.validate.inputs($('.student-form'), 'fees');"
    type="button"
    style="float: right;"
    class="nice-button"
  >NEXT</button>
  <button
    type="button"
    onclick="window.location.href = '/#parent-guardians'"
    style="float: right; margin-right: 15px;"
    class="nice-button"
  >BACK</button>
  <div style="clear: both;"></div>
</div>

<script>
  /* Students.js starter to load in students.*/
  ST_init_loadin();
</script>
