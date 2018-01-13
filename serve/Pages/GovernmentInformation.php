<div class="box title">
  <h2 style="margin: 0;">
    Commonwealth Government Information
  </h2>
</div>

<div class="box">
  <p>
    The following information is required for the collection and reporting of information on student
    background characteristics in all government and non-government schools by all State, Territory and
    Commonwealth Education Ministers.
  </p>
  <p>
    All information which could identify or would reasonably identify individuals is removed from national
    reporting so that no personal information is reported publicly. Information collected from this form will
    be covered by Kempsey Adventist School’s Privacy Policy. A copy of this policy is available from the KAS
    office.
  </p>
  <p>
    <b>NOTE:</b> please only fill out appropriate information regarding student.
  </p>
</div>

<div class="box" style="margin-top: 30px;">

  <form class="formation" method="post">
    <div class="row" style="margin-left: 0; margin-right: 0;">

        <div class="col-4 col"><h4>Mother</h4></div>
        <div class="col-4 col"><h4>Father</h4></div>
        <div class="col-4 col"><h4>Guardian</h4></div>

        <div class="divider" style="margin-top: 15px;"></div>
        <div class="col-12 col"><div class="label">HIGHEST EDUCATION (PRIMARY/SECONDARY SCHOOL):</div></div>

              <div class="col-4 col" style="padding-right: 5px;">
                <select onchange="manage_dc_gi(this);" name="mother-highest-education">
                  <option>-- Select --</option>
                  <option value="12" <?=(isset($_SESSION['government-information']['mother-highest-education']) && $_SESSION['government-information']['mother-highest-education'] == '12')?'selected="selected"':'';?>>Year 12 or equivalent</option>
                  <option value="11" <?=(isset($_SESSION['government-information']['mother-highest-education']) && $_SESSION['government-information']['mother-highest-education'] == '11')?'selected="selected"':'';?>>Year 11 or equivalent</option>
                  <option value="10" <?=(isset($_SESSION['government-information']['mother-highest-education']) && $_SESSION['government-information']['mother-highest-education'] == '10')?'selected="selected"':'';?>>Year 10 or equivalent</option>
                  <option value="9" <?=(isset($_SESSION['government-information']['mother-highest-education']) && $_SESSION['government-information']['mother-highest-education'] == '9')?'selected="selected"':'';?>>Year 9 or equivalent/below</option>
                </select>
              </div>
              <div class="col-4 col" style="padding-right: 5px;">
                <select onchange="manage_dc_gi(this);" name="father-highest-education">
                  <option>-- Select --</option>
                  <option value="12" <?=(isset($_SESSION['government-information']['father-highest-education']) && $_SESSION['government-information']['father-highest-education'] == '12')?'selected="selected"':'';?>>Year 12 or equivalent</option>
                  <option value="11" <?=(isset($_SESSION['government-information']['father-highest-education']) && $_SESSION['government-information']['father-highest-education'] == '11')?'selected="selected"':'';?>>Year 11 or equivalent</option>
                  <option value="10" <?=(isset($_SESSION['government-information']['father-highest-education']) && $_SESSION['government-information']['father-highest-education'] == '10')?'selected="selected"':'';?>>Year 10 or equivalent</option>
                  <option value="9" <?=(isset($_SESSION['government-information']['father-highest-education']) && $_SESSION['government-information']['father-highest-education'] == '9')?'selected="selected"':'';?>>Year 9 or equivalent/below</option>
                </select>
              </div>
              <div class="col-4 col">
                <select onchange="manage_dc_gi(this);" name="guardian-highest-education">
                  <option>-- Select (optional) --</option>
                  <option value="12" <?=(isset($_SESSION['government-information']['guardian-highest-education']) && $_SESSION['government-information']['guardian-highest-education'] == '12')?'selected="selected"':'';?>>Year 12 or equivalent</option>
                  <option value="11" <?=(isset($_SESSION['government-information']['guardian-highest-education']) && $_SESSION['government-information']['guardian-highest-education'] == '11')?'selected="selected"':'';?>>Year 11 or equivalent</option>
                  <option value="10" <?=(isset($_SESSION['government-information']['guardian-highest-education']) && $_SESSION['government-information']['guardian-highest-education'] == '10')?'selected="selected"':'';?>>Year 10 or equivalent</option>
                  <option value="9" <?=(isset($_SESSION['government-information']['guardian-highest-education']) && $_SESSION['government-information']['guardian-highest-education'] == '9')?'selected="selected"':'';?>>Year 9 or equivalent/below</option>
                </select>
              </div>


        <div class="divider" style="margin-top: 15px;"></div>
        <div class="col-12 col"><div class="label">HIGHEST QUALIFICATION COMPLETED:</div></div>

              <div class="col-4 col" style="padding-right: 5px;">
                <select onchange="manage_dc_gi(this);" name="mother-highest-qualification">
                  <option>-- Select --</option>
                  <option <?=(isset($_SESSION['government-information']['mother-highest-qualification']) && $_SESSION['government-information']['mother-highest-qualification'] == 'Bachelor Degree or above')?'selected="selected"':'';?>>Bachelor Degree or above</option>
                  <option <?=(isset($_SESSION['government-information']['mother-highest-qualification']) && $_SESSION['government-information']['mother-highest-qualification'] == 'Diploma/Advanced Dip')?'selected="selected"':'';?>>Diploma/Advanced Dip</option>
                  <option <?=(isset($_SESSION['government-information']['mother-highest-qualification']) && $_SESSION['government-information']['mother-highest-qualification'] == 'Certificate I,II,III, IV, Trade')?'selected="selected"':'';?>>Certificate I,II,III, IV, Trade</option>
                  <option <?=(isset($_SESSION['government-information']['mother-highest-qualification']) && $_SESSION['government-information']['mother-highest-qualification'] == 'No non-school qualification')?'selected="selected"':'';?>>No non-school qualification</option>
                </select>
              </div>
              <div class="col-4 col" style="padding-right: 5px;">
                <select onchange="manage_dc_gi(this);" name="father-highest-qualification">
                  <option>-- Select --</option>
                  <option <?=(isset($_SESSION['government-information']['father-highest-qualification']) && $_SESSION['government-information']['father-highest-qualification'] == 'Bachelor Degree or above')?'selected="selected"':'';?>>Bachelor Degree or above</option>
                  <option <?=(isset($_SESSION['government-information']['father-highest-qualification']) && $_SESSION['government-information']['father-highest-qualification'] == 'Diploma/Advanced Dip')?'selected="selected"':'';?>>Diploma/Advanced Dip</option>
                  <option <?=(isset($_SESSION['government-information']['father-highest-qualification']) && $_SESSION['government-information']['father-highest-qualification'] == 'Certificate I,II,III, IV, Trade')?'selected="selected"':'';?>>Certificate I,II,III, IV, Trade</option>
                  <option <?=(isset($_SESSION['government-information']['father-highest-qualification']) && $_SESSION['government-information']['father-highest-qualification'] == 'No non-school qualification')?'selected="selected"':'';?>>No non-school qualification</option>
                </select>
              </div>
              <div class="col-4 col">
                <select onchange="manage_dc_gi(this);" name="guardian-highest-qualification">
                  <option>-- Select (optional) --</option>
                  <option <?=(isset($_SESSION['government-information']['guardian-highest-qualification']) && $_SESSION['government-information']['guardian-highest-qualification'] == 'Bachelor Degree or above')?'selected="selected"':'';?>>Bachelor Degree or above</option>
                  <option <?=(isset($_SESSION['government-information']['guardian-highest-qualification']) && $_SESSION['government-information']['guardian-highest-qualification'] == 'Diploma/Advanced Dip')?'selected="selected"':'';?>>Diploma/Advanced Dip</option>
                  <option <?=(isset($_SESSION['government-information']['guardian-highest-qualification']) && $_SESSION['government-information']['guardian-highest-qualification'] == 'Certificate I,II,III, IV, Trade')?'selected="selected"':'';?>>Certificate I,II,III, IV, Trade</option>
                  <option <?=(isset($_SESSION['government-information']['guardian-highest-qualification']) && $_SESSION['government-information']['guardian-highest-qualification'] == 'No non-school qualification')?'selected="selected"':'';?>>No non-school qualification</option>
                </select>
              </div>


        <div class="divider" style="margin-top: 15px;"></div>
        <div class="col-12 col"><div class="label">MOST SPOKEN LANGUAGE AT HOME:</div></div>


              <div class="col-4 col" style="padding-right: 5px;">
                <input
                  type="text"
                  name="mother-most-spoken-language"
                  onkeyup="manage_dc_gi(this);"
                  value="<?=(isset($_SESSION['government-information']['mother-most-spoken-language']))?$_SESSION['government-information']['mother-most-spoken-language']:'';?>"
                  placeholder="(language)"
                />
              </div>
              <div class="col-4 col" style="padding-right: 5px;">
                <input
                  type="text"
                  name="father-most-spoken-language"
                  onkeyup="manage_dc_gi(this);"
                  value="<?=(isset($_SESSION['government-information']['father-most-spoken-language']))?$_SESSION['government-information']['father-most-spoken-language']:'';?>"
                  placeholder="(language)"
                />
              </div>
              <div class="col-4 col">
                <input
                  type="text"
                  name="guardian-most-spoken-language"
                  onkeyup="manage_dc_gi(this);"
                  value="<?=(isset($_SESSION['government-information']['guardian-most-spoken-language']))?$_SESSION['government-information']['guardian-most-spoken-language']:'';?>"
                  placeholder="(language)"
                />
              </div>


        <div class="divider" style="margin-top: 15px;"></div>
        <div class="col-12 col"><div class="label">OCCUPATIONAL GROUP:</div></div>


              <div class="col-4 col" style="padding-right: 5px;">
                <input
                  type="text"
                  name="mother-occupational-group"
                  onkeyup="manage_dc_gi(this);"
                  value="<?=(isset($_SESSION['government-information']['mother-occupational-group']))?$_SESSION['government-information']['mother-occupational-group']:'';?>"
                  placeholder="(group number)"
                />
              </div>
              <div class="col-4 col" style="padding-right: 5px;">
                <input
                  type="text"
                  name="father-occupational-group"
                  onkeyup="manage_dc_gi(this);"
                  value="<?=(isset($_SESSION['government-information']['father-occupational-group']))?$_SESSION['government-information']['father-occupational-group']:'';?>"
                  placeholder="(group number)"
                />
              </div>
              <div class="col-4 col">
                <input
                  type="text"
                  name="guardian-occupational-group"
                  onkeyup="manage_dc_gi(this);"
                  value="<?=(isset($_SESSION['government-information']['guardian-occupational-group']))?$_SESSION['government-information']['guardian-occupational-group']:'';?>"
                  placeholder="(group number)"
                />
              </div>


          <div class="col-12 col">
            <small class="small">Your occupational group can be found under this box. It refers to the type of workplace and industry you're in.</small>
          </div>


    </div>
  </form>
  <script>
  /*manage-data-collection-government-information*/
    function manage_dc_gi(object) {
      $obect = $(object);
      $.post('/api/post', {
        type:   'save-dc',
        saveto: 'government-information',
        name: $(object).attr('name'),
        value: $(object).val()
      }, function(response){
        console.log(response);
      });
    }
  </script>
</div>


<div class="box" style="margin-top: 30px;">
  <a href="#worker-group-numbers">Click here for more information on the worker groups</a>.
</div>


<div class="box" style="margin-top: 30px; margin-bottom: 30px;">
  <button
    type="button"
    onclick="window.location.href = '/#fees'"
    style="float: left; margin-right: 15px;"
    class="nice-button"
  >BACK</button>

  <button
    onclick="window.location.href = '/#caregiver-agreement';"
    type="button"
    style="float: right;"
    class="nice-button"
  >CAREGIVER AGREEMENT</button>
  <div style="clear: both;"></div>
</div>
