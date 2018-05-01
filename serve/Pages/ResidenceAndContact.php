<form id="residence-and-contact">

  <div class="box row formation">
    <h3>Do all of the children being enrolled as part of this application live in the same house?</h3>
    <div class="col-6 col">
      <div class="decide-box" data-decision="yes" id="yes">
        <span>Yes</span>
      </div>
    </div>
    <div class="col-6">
      <div class="decide-box" data-decision="no" id="no">
        <span>No</span>
      </div>
    </div>
    <script>
      $('#yes, #no').click(function(event){
        let $this = $(this);
        var decide = $this.attr('data-decision');
        if (decide == "yes") {
          $('#yes-pick').fadeIn(500);
          $('#no-pick').css({display:'none'});
          $.get('/api/get/change-choice-rac/yes', function(response){});
        }
        else {
          $('#no-pick').fadeIn(500);
          $('#yes-pick').css({display:'none'});
          $.get('/api/get/change-choice-rac/no', function(response){});
        }
      });
    </script>
  </div>

  <?php //$_SESSION['contact']; ?>

  <div id="yes-pick" style="display: <?=(isset($_SESSION['change-choice-rac']) && $_SESSION['change-choice-rac'] == 'yes')?"block":"none"?>;">
    <div class="box row formation">
      <h2>All children live under the same household, which parent do they live with?</h2>
      <select
        onchange="$.get('/api/get/set-all-students-home/'+this.value, function(response){console.log(response);});"
        style="margin-top: 20px;"
      >
        <option value="none">-- Select --</option>
        <?php foreach ($_SESSION['parents'] as $parent): ?>
          <option <?=(isset($_SESSION['all-students-live-with']) && urldecode($_SESSION['all-students-live-with']) == "{$parent['data']['first-name']} {$parent['data']['last-name']}")?"selected='selected'":"";?>><?=$parent['data']['first-name']?> <?=$parent['data']['last-name']?></option>
        <?php endforeach; ?>
      </select>

    </div>
    <div class="box" style="margin-bottom: 30px;">
      <button
      onclick="window.location.href='#caregiver-agreement';"
      type="button"
      style="float: right;"
      class="nice-button"
      >NEXT</button>
      <button
      onclick="window.location.href='#fees';"
      type="button"
      style="float: right; margin-right: 15px;"
      class="nice-button"
      >BACK</button>
      <div style="clear: both;"></div>
    </div>
  </div>



  <div id="no-pick" style="display: <?=(isset($_SESSION['change-choice-rac']) && $_SESSION['change-choice-rac'] == 'no')?"block":"none"?>;">
    <div class="box row formation" id="no-pick">
      <h2>Please fill out the housing arangements for each child</h2>
      <?php foreach ($_SESSION['students'] as $id => $student): ?>
        <div class="row" style="width: 100%; margin: 0; margin-top: 20px;">
            <div class="col-6 col">
              <input
                type="text"
                class="connected-left"
                value="<?=$student['data']['first-name']?> <?=$student['data']['last-name']?>"
                disabled="disabled"
              />
            </div>
            <div class="col-6 col">
              <select
              class="connected-right"
              onchange="$.get('/api/get/change-student-home/'+this.value, function(response){console.log(response);})"
              >
              <option value="none">-- Select --</option>
              <?php foreach ($_SESSION['parents'] as $parent): ?>
                <option
                  value="<?=$id?>/<?=$parent['data']['first-name']?> <?=$parent['data']['last-name']?>"
                  <?=(isset($student['data']['home']) && $student['data']['home'] == urldecode("{$parent['data']['first-name']} {$parent['data']['last-name']}"))?"selected='selected'":"";?>
                ><?=$parent['data']['first-name']?> <?=$parent['data']['last-name']?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="box" style="margin-bottom: 30px;">
      <button
        onclick="window.location.href='#caregiver-agreement';"
        type="button"
        style="float: right;"
        class="nice-button"
      >NEXT</button>
      <button
        onclick="window.location.href='#fees';"
        type="button"
        style="float: right; margin-right: 15px;"
        class="nice-button"
      >BACK</button>
      <div style="clear: both;"></div>
    </div>
  </div>
</form>
