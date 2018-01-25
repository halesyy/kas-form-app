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
    onclick="window.location.href = '/#parent-guardians'"
    style="float: left; margin-right: 15px;"
    class="nice-button"
  >PARENTS</button>

  <button
    onclick="window.fn.validate_page_forms('fees');"
    type="button"
    style="float: right;"
    class="nice-button"
  >FEES</button>
  <button
    type="button"
    onclick="window.fn.new.form('students');"
    style="float: right; margin-right: 10px;"
    class="nice-button green"
  >ADD STUDENT</button>
  <div style="clear: both;"></div>
</div>

<script>
  /* Students.js starter to load in students.*/
  ST_init_loadin();
</script>
