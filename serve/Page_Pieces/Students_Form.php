<form class="student-form">
  <div data-id="<?=$id?>" data-type="students">
    <div class="box row formation">
      <h4 class="students-title gold" style="width: 100%;">
        <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
        <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
        <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>

        <?php if (!$first): ?>
          <span class="delete delete-parent" title="Delete Student" data-type="students" data-id="<?=$id?>" style="float: right;">x</span>
        <?php endif; ?>
      </h4>


      <div class="col-3"><span class="label">FIRST NAME:</span></div>
      <div class="col-3"><span class="label">MIDDLE NAME:</span></div>
      <div class="col-3"><span class="label">PREFERRED NAME:</span></div>
      <div class="col-3"><span class="label">LAST NAME:</span></div>

      <div class="col-3 col">
          <input
            type="text"
            id="first-name"
            class="connected-left required"
            name="first-name"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['first-name']))?$data['first-name']:"";?>"
          />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          id="middle-name"
          name="middle-name"
          placeholder="(optional)"
          class="connected-middle"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['middle-name']))?$data['middle-name']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          name="preferred-name"
          placeholder="(optional)"
          class="connected-middle"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['preferred-name']))?$data['preferred-name']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          id="last-name"
          name="last-name"
          class="connected-right required"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['last-name']))?$data['last-name']:"";?>"
        />
      </div>

      <hr class="divider" />

      <div class="col-3"><span class="label">YEAR STARING:</span></div>
      <div class="col-3"><span class="label">DATE OF BIRTH:</span></div>
      <div class="col-3"><span class="label">YEAR LEVEL:</span></div>
      <div class="col-3"><span class="label">GENDER:</span></div>


      <div class="col-3 col">
          <select
            name="year-starting"
            class="connected-left required"
            type="select"
            onchange="window.fn.save_handler(this);"
          >
            <option value="none">-- Select --</option>
            <?php for ($i = date('o'); $i <= date('o')+7; $i++): ?>
              <option value="<?=$i?>" <?=(isset($data['year-starting']) && $data['year-starting'] == $i)? "selected='selected'":"";?>><?=$i?></option>
            <?php endfor; ?>
        </select>
      </div>
      <div class="col-3 col">
          <input
            type="text"
            class="connected-middle required"
            name="date-of-birth"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['date-of-birth']))?$data['date-of-birth']:"";?>"
          />
      </div>
      <div class="col-3 col">
          <select
            name="year-level"
            type="select"
            class="connected-middle required"
            onchange=
              "window.fn.save_handler(this); if (this.value == -1) {$('#pre-kindy-enrolment-<?=$id?>').slideDown(500);}else{$('#pre-kindy-enrolment-<?=$id?>').slideUp(500);}"
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
      <div class="col-3 col">
        <select
          name="gender"
          type="select"
          class="connected-right required"
          onchange="window.fn.save_handler(this);"
        >
          <option value="none">-- Select --</option>
          <option value="female" <?=(isset($data['gender']) && $data['gender'] == 'female')?"selected='selected'":"";?>>Female</option>
          <option value="male" <?=(isset($data['gender']) && $data['gender'] == 'male')?"selected='selected'":"";?>>Male</option>
          <option value="other" <?=(isset($data['gender']) && $data['gender'] == 'other')?"selected='selected'":"";?>>Other</option>
        </select>
      </div>


      <div class="col-12"><span class="label">ADDRESS:</span></div>

      <input
        type="text"
        name="address"
        onkeyup="window.fn.save_handler(this);"
        value="<?=(isset($_SESSION['parents'][0]['data']['address']))?$_SESSION['parents'][0]['data']['address']:""?>"
        value="<?=(isset($data['address']))?$data['address']:"";?>"
      />


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
      <h4 style="width: 100%;" class="gold">Demographic Background</h4>


      <div class="col-3 col"><span class="label">COUNTRY OF BIRTH:</span></div>
      <div class="col-3 col"><span class="label">NATIONALITY:</span></div>
      <div class="col-3 col"><span class="label">LANGUAGE SPOKEN AT HOME:</span></div>
      <div class="col-3 col"><span class="label">VISA:</span></div>

      <div class="col-3 col">
        <input
          type="text"
          onkeyup="window.fn.save_handler(this);"
          class="required connected-left"
          name="country-of-birth"
          value="<?=(isset($data['country-of-birth']))?$data['country-of-birth']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          name="language-spoken-at-home"
          onkeyup="window.fn.save_handler(this);"
          class="required connected-middle"
          value="<?=(isset($data['language-spoken-at-home']))?$data['language-spoken-at-home']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          name="nationality"
          onkeyup="window.fn.save_handler(this);"
          class="required connected-middle"
          value="<?=(isset($data['nationality']))?$data['nationality']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <select
          name="visa"
          onchange="window.fn.save_handler(this);"
          class="connected-right required"
          type="select"
        >
          <option value="none">-- Select --</option>
          <option value="Resident" <?=(isset($data['visa']) && $data['visa'] == 'Resident')?"selected='selected'":""?>>Australian Resident</option>
          <option value="Temporary"  <?=(isset($data['visa']) && $data['visa'] == 'Temporary' )?"selected='selected'":""?>>Temporary Visa</option>
          <option value="Permanent" <?=(isset($data['visa']) && $data['visa'] == 'Permanent')?"selected='selected'":""?>>Permanent</option>
        </select>
      </div>

      <div class="row" style="width: 100%; margin: 0; margin-top: 20px;">
        <div class="col-9 col">
          <div class="boxed connected-left">
            <strong>Is the child Aboriginal or Torres Strait Islander?</strong>
          </div>
        </div>
        <div class="col-3 col">
            <select
            name="is-aboriginal-or-torres-strait"
            onchange="window.fn.save_handler(this);"
            class="connected-right required"
            type="select"
            >
            <option value="none">-- Select --</option>
            <option value="yes" <?=(isset($data['is-aboriginal-or-torres-strait']) && $data['is-aboriginal-or-torres-strait'] == 'yes')?"selected='selected'":""?>>Yes</option>
            <option value="no"  <?=(isset($data['is-aboriginal-or-torres-strait']) && $data['is-aboriginal-or-torres-strait'] == 'no' )?"selected='selected'":""?>>No</option>
          </select>
        </div>
      </div>

      <div class="row" style="width: 100%; margin: 0; margin-top: 20px;">
        <div class="col-6 col"><span class="label">RELIGION:</span></div>
        <div class="col-6 col"><span class="label">PLACE OF WORSHIP:</span></div>
        <div class="col-6 col">
          <input
            type="text"
            placeholder="(optional)"
            name="religion"
            onkeyup="window.fn.save_handler(this);"
            class="connected-left"
            value="<?=(isset($data['religion']))?$data['religion']:"";?>"
          />
        </div>
        <div class="col-6 col">
          <input
            type="text"
            placeholder="(optional)"
            name="place-of-worship"
            onkeyup="window.fn.save_handler(this);"
            class="connected-right"
            value="<?=(isset($data['place-of-worship']))?$data['place-of-worship']:"";?>"
          />
        </div>
      </div>















      <hr class="divider" />
      <h4 style="width: 100%;" class="gold">Educational Background</h4>

            <div class="col-4 col"><span class="label">PREVIOUS SCHOOL:</span></div>
            <div class="col-4 col"><span class="label">PREVIOUS YEAR:</span></div>
            <div class="col-4 col"><span class="label">BEEN SUSPENDED / REFUSED ADMISSION:</span></div>

            <div class="col-4 col">
              <input
                type="text"
                name="previous-school"
                class="connected-left required"
                onkeyup="window.fn.save_handler(this);"
                value="<?=(isset($data['previous-school']))?$data['previous-school']:"";?>"
              />
            </div>
            <div class="col-4 col">
              <input
                type="text"
                name="previous-year"
                class="connected-middle required"
                onkeyup="window.fn.save_handler(this);"
                value="<?=(isset($data['previous-year']))?$data['previous-year']:"";?>"
              />
            </div>
            <div class="col-4 col">
              <select
                name="suspended-expelled"
                onchange="window.fn.save_handler(this);"
                class="connected-right"
                type="select"
              >
                <option value="none">-- Select --</option>
                <option value="yes" <?=(isset($data['suspended-expelled']) && $data['suspended-expelled'] == 'yes')?"selected='selected'":""?>>Yes</option>
                <option value="no"  <?=(isset($data['suspended-expelled']) && $data['suspended-expelled'] == 'no' )?"selected='selected'":""?>>No</option>
              </select>
            </div>

            <div class="col-12">
                <span class="label">PLEASE EXPLAIN:</span>
            </div>

            <div class="col-12 col">
                <textarea
                  name="suspended-expelled-info"
                  onkeyup="window.fn.save_handler(this);"
                  placeholder="(only yes, fill out information about suspenssion/ expulsion/ denial to other school)"
                ><?=(isset($data['suspended-expelled-info']))?$data['suspended-expelled-info']:"";?></textarea>
            </div>







        <hr class="divider" />
        <h4 style="width: 100%;" class="gold">Medicare</h4>

        <div class="row" style="margin-left: 0; margin-right: 0;">
          <div class="col-4"><span class="label">MEDICARE NUMBER:</span></div>
          <div class="col-4"><span class="label">MEDICARE EXPIRY:</span></div>
          <div class="col-4"><span class="label">MEDICARE POSITION:</span></div>


          <div class="col-4 col">
            <input
            type="text"
            class="connected-left"
            name="medicare-number"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['medicare-number']))?$data['medicare-number']:"";?>"
            />
          </div>
          <div class="col-4 col">
            <input
            type="text"
            class="connected-right"
            name="medicare-expiry"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['medicare-expiry']))?$data['medicare-expiry']:"";?>"
            />
          </div>
          <div class="col-4 col">
            <input
            type="text"
            class="connected-right"
            name="medicare-position"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['medicare-position']))?$data['medicare-position']:"";?>"
            />
          </div>
        </div>







      <hr class="divider" />
      <h4 style="width: 100%;" class="gold">Medical Background</h4>

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
                <div class="row" style="margin: 0;">

                  <div class="col-4"><span class="label">COMPANY NAME:</span></div>
                  <div class="col-4"><span class="label">MEMBERSHIP NUMBER:</span></div>
                  <div class="col-4"><span class="label">TYPE OF COVER:</span></div>


                  <div class="col-4 col">
                    <input
                      type="text"
                      name="private-company"
                      class="connected-left"
                      onkeyup="window.fn.save_handler(this);"
                      value="<?=(isset($data['private-company']))?$data['private-company']:"";?>"
                    />
                  </div>
                  <div class="col-4 col">
                    <input
                      type="text"
                      name="private-membership-number"
                      class="connected-middle"
                      onkeyup="window.fn.save_handler(this);"
                      value="<?=(isset($data['private-membership-number']))?$data['private-membership-number']:"";?>"
                    />
                  </div>
                  <div class="col-4 col">
                    <select
                      name="private-cover"
                      onchange="window.fn.save_handler(this);"
                      class="connected-right"
                      type="select"
                    >
                      <option value="none">-- Select --</option>
                      <option value="ambulance" <?=(isset($data['private-cover']) && $data['private-cover'] == 'ambulance')?"selected='selected'":""?>>Ambulance ONLY</option>
                      <option value="ambulance-and-health"  <?=(isset($data['private-cover']) && $data['private-cover'] == 'ambulance-and-health' )?"selected='selected'":""?>>Ambulance and Health</option>
                    </select>
                  </div>
                </div>
            </div>



        <hr class="divider" />

        <div class="col-6 col" style="padding-right: 7.5px;"> <!-- doctor -->

            <span class="label">DOCTOR'S NAME:</span>
            <input
              type="text"
              class="required"
              name="doctors-name"
              onkeyup="window.fn.save_handler(this);"
              value="<?=(isset($data['doctors-name']))?$data['doctors-name']:"";?>"
              required
            />

            <div style="margin-top: 10px;"></div>
            <span class="label">DOCTOR'S PHONE:</span>
            <input
              type="text"
              class="required"
              name="doctors-phone"
              onkeyup="window.fn.save_handler(this);"
              value="<?=(isset($data['doctors-phone']))?$data['doctors-phone']:"";?>"
              required
            />

            <div style="margin-top: 10px;"></div>
            <span class="label">IS STUDENT IMMUNISED? <strong>REQUIRED</strong>:</span>
            <select
              name="immunised"
              onchange="window.fn.save_handler(this);"
              class="required"
              type="select"
            >
              <option value="none">-- Select --</option>
              <option value="yes" <?=(isset($data['immunised']) && $data['immunised'] == 'yes')?"selected='selected'":""?>>Yes</option>
              <option value="no"  <?=(isset($data['immunised']) && $data['immunised'] == 'no' )?"selected='selected'":""?>>No</option>
            </select>

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
                <span class="label" style="font-weight: bold;">Has your child been recommended for any of the following: Early intervention, occupational or speech therapy, assessment by a school counsellor or psychologist?</span> <br/>
                <select
                  name="early-intervention"
                  onchange="window.fn.save_handler(this);"
                  class="required"
                  type="select"
                  style="margin-top: 10px;"
                >
                  <option value="none">-- Select --</option>
                  <option value="yes" <?=(isset($data['early-intervention']) && $data['early-intervention'] == 'yes')?"selected='selected'":""?>>Yes</option>
                  <option value="no"  <?=(isset($data['early-intervention']) && $data['early-intervention'] == 'no' )?"selected='selected'":""?>>No</option>
                </select>
            </div>


        </div>
    </div>
  </div>
</form>
