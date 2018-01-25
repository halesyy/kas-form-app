<form>
  <div data-id="<?=$id?>" data-type="students">
    <div class="box row formation">
      <h4 class="students-title" style="width: 100%;">
        <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
        <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
        <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>

        <?php if (!$first): ?>
          <span class="delete delete-parent" title="Delete Student" data-type="students" data-id="<?=$id?>" style="float: right;">x</span>
        <?php endif; ?>
      </h4>


      <div class="col-4"><span class="label">FIRST NAME:</span></div>
      <div class="col-4"><span class="label">MIDDLE NAME:</span></div>
      <div class="col-4"><span class="label">LAST NAME:</span></div>

      <div class="col-4 col">
          <input
            type="text"
            id="first-name"
            class="connected-left"
            name="first-name"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['first-name']))?$data['first-name']:"";?>"
            required
          />
      </div>
      <div class="col-4 col">
        <input
          type="text"
          id="middle-name"
          name="middle-name"
          class="connected-middle"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['middle-name']))?$data['middle-name']:"";?>"
        />
      </div>
      <div class="col-4 col">
        <input
          type="text"
          id="last-name"
          name="last-name"
          class="connected-right"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['last-name']))?$data['last-name']:"";?>"
          required
        />
      </div>

      <hr class="divider" />

      <div class="col-4"><span class="label">YEAR STARING:</span></div>
      <div class="col-4"><span class="label">DATE OF BIRTH:</span></div>
      <div class="col-4"><span class="label">YEAR LEVEL:</span></div>

      <div class="col-4 col">
          <select
            name="year-starting"
            class="connected-left"
            onchange="window.fn.save_handler(this);"
            required
          >
            <option value="none">-- Select --</option>
            <?php for ($i = date('o'); $i <= date('o')+7; $i++): ?>
              <option value="<?=$i?>" <?=(isset($data['year-starting']) && $data['year-starting'] == $i)? "selected='selected'":"";?>><?=$i?></option>
            <?php endfor; ?>
        </select>
      </div>
      <div class="col-4 col">
          <input
            type="date"
            class="connected-middle"
            name="date-of-birth"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['date-of-birth']))?$data['date-of-birth']:"";?>"
            required
          />
      </div>
      <div class="col-4 col">
          <select
            name="year-level"
            class="connected-right"
            onchange=
              "window.fn.save_handler(this); if (this.value == -1) {$('#pre-kindy-enrolment-<?=$id?>').slideDown(500);}else{$('#pre-kindy-enrolment-<?=$id?>').slideUp(500);}"
            required
          >
              <option value="none">-- Select --</option>

              <option
                value="-1"
                <?=(isset($data['year-level']) && $data['year-level'] == -1)? "selected='selected'":"";?>
              >Pre-kindy</option>
              <option value="0" <?=(isset($data['year-level']) && $data['year-level'] == 0)? "selected='selected'":"";?>>Kindergarten</option>
              <option value="1" <?=(isset($data['year-level']) && $data['year-level'] == 1)? "selected='selected'":"";?>>Year 1</option>
              <option value="2" <?=(isset($data['year-level']) && $data['year-level'] == 2)? "selected='selected'":"";?>>Year 2</option>
              <option value="3" <?=(isset($data['year-level']) && $data['year-level'] == 3)? "selected='selected'":"";?>>Year 3</option>
              <option value="4" <?=(isset($data['year-level']) && $data['year-level'] == 4)? "selected='selected'":"";?>>Year 4</option>
              <option value="5" <?=(isset($data['year-level']) && $data['year-level'] == 5)? "selected='selected'":"";?>>Year 5</option>
              <option value="6" <?=(isset($data['year-level']) && $data['year-level'] == 6)? "selected='selected'":"";?>>Year 6</option>
              <option value="7" <?=(isset($data['year-level']) && $data['year-level'] == 7)? "selected='selected'":"";?>>Year 7</option>
              <option value="8" <?=(isset($data['year-level']) && $data['year-level'] == 8)? "selected='selected'":"";?>>Year 8</option>
              <option value="9" <?=(isset($data['year-level']) && $data['year-level'] == 9)? "selected='selected'":"";?>>Year 9</option>
              <option value="10" <?=(isset($data['year-level']) && $data['year-level'] == 10)? "selected='selected'":"";?>>Year 10</option>
              <option value="11" <?=(isset($data['year-level']) && $data['year-level'] == 11)? "selected='selected'":"";?>>Year 11</option>
              <option value="12" <?=(isset($data['year-level']) && $data['year-level'] == 12)? "selected='selected'":"";?>>Year 12</option>
          </select>
      </div>


      <div id="pre-kindy-enrolment-<?=$id?>" style="display: <?=(isset($data['year-level']) && $data['year-level'] == -1)?'block':'none';?>;">

        <hr class="divider" />
        <h4 style="width: 100%;">Pre-Kindy Enrolment</h4>
        <p>All children enrolled at Pre-Kindy must be eligible to commence Kindergarten at KAS in the following school year, that is, turning 5 by 31 March in their Kindergarten year.</p>
        <p>Please pick <strong>5 or more</strong> preferred pre-kindy days. (Pre-kindy is only available to those enroling for Kindergarten at KAS the following year.)</p>

        <div class="row highlight-1" style="margin-left: 0; margin-right: 0;">

          <div class="col-12"><h2>Week 1</h2></div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-1-1"
            <?=(isset($data['pk-1-1']) && $data['pk-1-1'] == true)?"checked='checked'":'';?>
          /> Monday</div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-1-2"
            <?=(isset($data['pk-1-2']) && $data['pk-1-2'] == true)?"checked='checked'":'';?>
          /> Tuesday</div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-1-3"
            <?=(isset($data['pk-1-3']) && $data['pk-1-3'] == true)?"checked='checked'":'';?>
          /> Wednesday</div>

          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-1-4"
            <?=(isset($data['pk-1-4']) && $data['pk-1-4'] == true)?"checked='checked'":'';?>
          /> Thursday</div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-1-5"
            <?=(isset($data['pk-1-5']) && $data['pk-1-5'] == true)?"checked='checked'":'';?>
          /> Friday</div>

        </div>
        <div class="row highlight-2 " style="margin-left: 0; margin-right: 0;">

          <div class="col-12"><h2>Week 2</h2></div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-2-1"
            <?=(isset($data['pk-2-1']) && $data['pk-2-1'] == true)?"checked='checked'":'';?>
          /> Monday</div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-2-2"
            <?=(isset($data['pk-2-2']) && $data['pk-2-2'] == true)?"checked='checked'":'';?>
          /> Tuesday</div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-2-3"
            <?=(isset($data['pk-2-3']) && $data['pk-2-3'] == true)?"checked='checked'":'';?>
          /> Wednesday</div>

          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-2-4"
            <?=(isset($data['pk-2-4']) && $data['pk-2-4'] == true)?"checked='checked'":'';?>
          /> Thursday</div>
          <div class="col-4"><input
            type="checkbox"
            onclick="window.fn.save_handler(this);"
            name="pk-2-5"
            <?=(isset($data['pk-2-5']) && $data['pk-2-5'] == true)?"checked='checked'":'';?>
          /> Friday</div>

        </div>


      </div>








      <hr class="divider" />
      <h4 style="width: 100%;">Educational Background</h4>

            <div class="col-6"><span class="label">PREVIOUS SCHOOL:</span></div>
            <div class="col-6"><span class="label">BEEN SUSPENDED / EXPELLED:</span></div>

            <div class="col-6 col">
              <input
                type="text"
                name="previous-school"
                class="connected-left"
                onkeyup="window.fn.save_handler(this);"
                value="<?=(isset($data['previous-school']))?$data['previous-school']:"";?>"
              />
            </div>
            <div class="col-6 col">
                <div class="boxed connected-right">

                    <input
                      id="suspended-expelled-yes"
                      type="radio"
                      class="open"
                      data-open="#suspended-expelled-info"
                      name="suspended-expelled"
                      value="true"
                      onclick="window.fn.save_handler(this);"
                      <?=(isset($data['suspended-expelled']) && $data['suspended-expelled'] == "true")?"checked":""?>
                    /> <label data-ref-for="suspended-expelled-yes">Yes</label>
                    <input
                      id="suspended-expelled-no"
                      type="radio"
                      class="none"
                      name="suspended-expelled"
                      style="margin-left: 10px;"
                      value="false"
                      data-close="#suspended-expelled-info"
                      onclick="window.fn.save_handler(this);"
                      <?=(isset($data['suspended-expelled']) && $data['suspended-expelled'] == "false")?"checked":""?>
                    /> <label data-ref-for="suspended-expelled-no">No</label>

                </div>
            </div>

            <div id="suspended-expelled-info" style="width: 100%; margin-top: 10px; display: <?=(isset($data['suspended-expelled']) && $data['suspended-expelled'] == "true")?"block":"none"?>;">
              <div class="col-12">
                  <span class="label">PLEASE EXPLAIN:</span>
              </div>

              <div class="col-12 col">
                  <textarea
                    name="suspended-expelled-info"
                    onkeyup="window.fn.save_handler(this);"
                    placeholder="* Give information about reasons behind suspension, expulsion or deinal to another school..."
                  ><?=(isset($data['suspended-expelled-info']))?$data['suspended-expelled-info']:"";?></textarea>
              </div>
            </div>

      <hr class="divider" />
      <h4 style="width: 100%;">Medical Background</h4>

            <div class="col-12"><span class="label">PRIVATE HEALTH FUND/ AMBULANCE? <strong>REQUIRED</strong>:</span></div>
            <div class="col-12 col boxed">
              <input
                id="has-health-fund-yes"
                type="radio"
                class="open"
                name="has-health-fund"
                style="margin-left: 10px;"
                value="true"
                data-open="#has-health-fund-info-<?=$id?>"
                onclick="window.fn.save_handler(this);"
                <?=(isset($data['has-health-fund']) && $data['has-health-fund'] == "true")?"checked":""?>
              /> <label data-ref-for="has-health-fund-yes">Yes</label>
              <input
                id="has-health-fund-no"
                type="radio"
                class="none"
                name="has-health-fund"
                style="margin-left: 10px;"
                value="false"
                data-close="#has-health-fund-info-<?=$id?>"
                onclick="window.fn.save_handler(this);"
                <?=(isset($data['has-health-fund']) && $data['has-health-fund'] == "false")?"checked":""?>
              /> <label data-ref-for="has-health-fund-no">No</label>
            </div>

            <div id="has-health-fund-info-<?=$id?>" style="width: 100%; margin-top: 10px; display: <?=(isset($data['has-health-fund']) && $data['has-health-fund'] == "true")?"block":"none"?>;">
                  <div class="col-12"><span class="label">COMPANY AND MEMBER #:</span></div>

                  <div class="col-12 col">
                      <textarea
                        name="has-health-fund-info"
                        class="boxed-no-height"
                        onkeyup="window.fn.save_handler(this);"
                        placeholder="* Please supply company and member ID..."
                      ><?=(isset($data['has-health-fund-info']))?$data['has-health-fund-info']:"";?></textarea>
                  </div>

                  <div class="row" style="margin-left: 0; margin-right: 0;">
                      <div class="col-6"><span class="label">MEDICARE NUMBER:</span></div>
                      <div class="col-6"><span class="label">MEDICARE EXPIRY:</span></div>


                      <div class="col-6 col">
                        <input
                          type="text"
                          class="connected-left"
                          name="medicare-number"
                          onkeyup="window.fn.save_handler(this);"
                          value="<?=(isset($data['medicare-number']))?$data['medicare-number']:"";?>"
                        />
                      </div>
                      <div class="col-6 col">
                          <input
                            type="text"
                            class="connected-right"
                            name="medicare-expiry"
                            onkeyup="window.fn.save_handler(this);"
                            value="<?=(isset($data['medicare-expiry']))?$data['medicare-expiry']:"";?>"
                          />
                      </div>
                  </div>
            </div>


        <hr class="divider" />
        <div class="col-6 col"><h5>DOCTOR</h5></div>
        <div class="col-6 col"><h5>CONDITIONS</h5></div>

        <div class="col-6 col" style="padding-right: 7.5px;"> <!-- doctor -->

            <span class="label">DOCTOR'S NAME:</span>
            <input
              type="text"
              name="doctors-name"
              onkeyup="window.fn.save_handler(this);"
              value="<?=(isset($data['doctors-name']))?$data['doctors-name']:"";?>"
              required
            />

            <div style="margin-top: 10px;"></div>
            <span class="label">DOCTOR'S PHONE:</span>
            <input
              type="text"
              name="doctors-phone"
              onkeyup="window.fn.save_handler(this);"
              value="<?=(isset($data['doctors-phone']))?$data['doctors-phone']:"";?>"
              required
            />

            <div style="margin-top: 10px;"></div>
            <span class="label">IS STUDENT IMMUNISED? <strong>REQUIRED</strong>:</span>
            <div class="boxed">
              <input
                id="immunised-yes"
                type="radio"
                name="immunised"
                value="true"
                onclick="window.fn.save_handler(this);"
                <?=(isset($data['immunised']) && $data['immunised'] == "true")?"checked":""?>
              /> <label data-ref-for="immunised-yes" style="margin-right: 10px;">Yes</label>
              <input
                id="immunised-no"
                type="radio"
                name="immunised"
                value="false"
                onclick="window.fn.save_handler(this);"
                <?=(isset($data['immunised']) && $data['immunised'] == "false")?"checked":""?>
              /> <label data-ref-for="immunised-no">No</label>
            </div>

            <div style="margin-top: 10px;"></div>
            <span class="label">STUDENT WEARS:</span>
            <div class="boxed">
              <input
                id="glasses"
                type="checkbox"
                name="glasses"
                onclick="window.fn.save_handler(this);"
                <?=(isset($data['glasses']) && $data['glasses'] == "true")?"checked":""?>
              /> <label data-ref-for="glasses" style="margin-right: 10px;">Glasses</label>
              <input
                id="contacts"
                type="checkbox"
                name="contacts"
                onclick="window.fn.save_handler(this);"
                <?=(isset($data['contacts']) && $data['contacts'] == "true")?"checked":""?>
              /> <label data-ref-for="contacts">Contacts</label>
            </div>


        </div>
        <div class="col-6 col" style="padding-left: 7.5px;"> <!-- conditions -->

            <span class="label">DOES STUDENT SUFFER FROM:</span>
            <div class="boxed boxed-no-height connected-top">

              <div class="row" style="margin: 0;">
                <div class="col-6 col">
                    <input id="asthma" type="checkbox" name="asthma" onclick="window.fn.save_handler(this);"
                    <?=(isset($data['asthma']) && $data['asthma'] == "true")?"checked":""?>
                    />
                    <label data-ref-for="asthma">Asthma</label> <br/>

                    <input id="diabetes" type="checkbox" name="diabetes" onclick="window.fn.save_handler(this);"
                    <?=(isset($data['diabetes']) && $data['diabetes'] == "true")?"checked":""?>
                    />
                    <label data-ref-for="diabetes">Diabetes</label> <br/>

                    <input id="allergies" type="checkbox" name="allergies" onclick="window.fn.save_handler(this);"
                    <?=(isset($data['allergies']) && $data['allergies'] == "true")?"checked":""?>
                    />
                    <label data-ref-for="allergies">Allergies</label> <br/>
                </div>
                <div class="col-6 col">
                    <input id="adhd" type="checkbox" name="adhd" onclick="window.fn.save_handler(this);"
                    <?=(isset($data['adhd']) && $data['adhd'] == "true")?"checked":""?>
                    />
                    <label data-ref-for="adhd">ADHD</label> <br/>

                    <input id="adhd" type="checkbox" name="epilepsy" onclick="window.fn.save_handler(this);"
                    <?=(isset($data['epilepsy']) && $data['epilepsy'] == "true")?"checked":""?>
                    />
                    <label data-ref-for="epilepsy">Epilepsy</label> <br/>

                    <input id="autism" type="checkbox" name="autism" onclick="window.fn.save_handler(this);"
                    <?=(isset($data['autism']) && $data['autism'] == "true")?"checked":""?>
                    />
                    <label data-ref-for="autism">Autism</label> <br/>
                </div>
              </div>

            </div>
            <div class="boxed boxed-no-height connected-vertical-middle">
              <textarea
                name="conditions-info"
                class="boxed-no-height"
                onkeyup="window.fn.save_handler(this);"
                placeholder="* If yes, please give information about conditions..."
              ><?=(isset($data['conditions-info']))?$data['conditions-info']:"";?></textarea>
            </div>
            <div class="boxed boxed-no-height connected-bottom">
                <span class="label">STUDENT RECIEVED EARLY INTERVENTION:</span> <br/>
                <input id="early-intervention-yes" type="radio" name="early-intervention" onclick="window.fn.save_handler(this);" value="true"
                  <?=(isset($data['early-intervention']) && $data['early-intervention'] == "true")?"checked":""?>
                />
                <label data-ref-for="early-intervention-yes" style="margin-right: 10px;">Yes</label>

                <input id="early-intervention-no" type="radio" name="early-intervention" onclick="window.fn.save_handler(this);" value="false"
                  <?=(isset($data['early-intervention']) && $data['early-intervention'] == "false")?"checked":""?>
                />
                <label data-ref-for="early-intervention-no">No</label> <br/>
            </div>


        </div>
    </div>
  </div>
</form>
