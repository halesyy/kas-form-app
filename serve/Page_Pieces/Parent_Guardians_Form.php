<form class="parent-guardian-form">
<div data-id="<?=$id?>" data-type="parent-guardians">
  <div class="box row formation">

    <h4 class="parent-guardians-title" style="width: 100%;">
      <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
      <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
      <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>

      <?php if (!$first): ?>
        <span class="delete delete-parent" title="Delete Parent / Guardian" data-type="parent-guardians" data-id="<?=$id?>" style="float: right;">x</span>
      <?php endif; ?>
    </h4>

    <!---->

    <span class="label">EMAIL:</span>
    <input
      type="email"
      name="email"
      onkeyup="window.fn.save_handler(this);"
      value="<?=(isset($data['email']))? $data['email']:"";?>"
      class="required"
    />
    <span class="small">Upon completion please check your email, we will send a copy of your enrolment form to you.</span>

    <!---->

    <div class="divider"></div>

      <div class="col-6"><span class="label">RELATIONSHIP TO STUDENT(S):</span></div>
      <div class="col-6"><span class="label">RELATIONSHIP STATUS:</span></div>

      <div class="col-6 col">
          <select
            name="relationship-to-student"
            class="connected-left required"
            type="select"
            onchange="window.fn.save_handler(this);"
          >
            <!---->
            <option value="none">-- Select --</option>
            <option value="mother" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "mother")? "selected='selected'":"";?>>Mother</option>
            <option value="father" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "father")? "selected='selected'":"";?>>Father</option>
            <option value="guardian" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "guardian")? "selected='selected'":"";?>>Guardian</option>
            <option value="social-worker" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "social-worker")? "selected='selected'":"";?>>Social Worker</option>
            <option value="step-parent" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "step-parent")? "selected='selected'":"";?>>Step Parent</option>
            <option value="grand-parent" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "grand-parent")? "selected='selected'":"";?>>Grand Parent</option>
            <option value="sibling" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "sibling")? "selected='selected'":"";?>>Sibling</option>
            <option value="uncle" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "uncle")? "selected='selected'":"";?>>Uncle</option>
            <option value="aunty" <?=(isset($data['relationship-to-student']) && $data['relationship-to-student'] == "aunty")? "selected='selected'":"";?>>Aunty</option>

          </select>
      </div>
      <div class="col-6 col">
          <select
            name="relationship-status"
            class="connected-right required"
            type="select"
            onchange="window.fn.save_handler(this);"
          >
            <!---->
            <option value="none">-- Select --</option>
            <option value="single" <?=(isset($data['relationship-status']) && $data['relationship-status'] == "single")? "selected='selected'":"";?>>Single</option>
            <option value="married" <?=(isset($data['relationship-status']) && $data['relationship-status'] == "married")? "selected='selected'":"";?>>Married</option>
            <option value="defacto" <?=(isset($data['relationship-status']) && $data['relationship-status'] == "defacto")? "selected='selected'":"";?>>De Facto</option>
            <option value="divorced" <?=(isset($data['relationship-status']) && $data['relationship-status'] == "divorced")? "selected='selected'":"";?>>Divorced</option>
            <option value="widowed" <?=(isset($data['relationship-status']) && $data['relationship-status'] == "widowed")? "selected='selected'":"";?>>Widowed</option>
            <option value="seperated" <?=(isset($data['relationship-status']) && $data['relationship-status'] == "seperated")? "selected='selected'":"";?>>Seperated</option>
          </select>
      </div>




      <hr class="divider" style="margin-top: 20px;" />

      <div class="col-3"><span class="label">TITLE:</span></div>
      <div class="col-3"><span class="label">YOUR FIRST NAME:</span></div>
      <div class="col-3"><span class="label">MIDDLE NAME:</span></div>
      <div class="col-3"><span class="label">LAST NAME:</span></div>

      <div class="col-3 col">
          <select
            name="title"
            class="connected-left required"
            type="select"
            onchange="window.fn.save_handler(this);"
          >
            <option value="none">-- Select --</option>
            <option value="Mr" <?=(isset($data['title']) && $data['title'] == "Mr")? "selected='selected'":"";?>>Mr</option>
            <option value="Mrs" <?=(isset($data['title']) && $data['title'] == "Mrs")? "selected='selected'":"";?>>Mrs</option>
            <option value="Miss" <?=(isset($data['title']) && $data['title'] == "Miss")? "selected='selected'":"";?>>Miss</option>
            <option value="Ms" <?=(isset($data['title']) && $data['title'] == "Ms")? "selected='selected'":"";?>>Ms</option>
            <option value="Dr" <?=(isset($data['title']) && $data['title'] == "Dr")? "selected='selected'":"";?>>Dr</option>
            <option value="Prof" <?=(isset($data['title']) && $data['title'] == "Prof")? "selected='selected'":"";?>>Prof</option>
            <option value="Rev" <?=(isset($data['title']) && $data['title'] == "Rev")? "selected='selected'":"";?>>Rev</option>
          </select>
      </div>
      <div class="col-3 col">
          <input
            type="text"
            id="first-name"
            class="connected-middle required"
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
          class="connected-middle"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['middle-name']))?$data['middle-name']:"";?>"
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

      <div class="col-8"><span class="label">MOBILE NUMBER:</span></div>
      <div class="col-4"><span class="label">RECIEVE SMS ABOUT STUDENT(S):</span></div>

      <div class="col-8 col">
        <input
          type="text"
          class="connected-left required"
          name="phone-number"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['phone-number']))?$data['phone-number']:"";?>"
        />
      </div>
      <div class="col-4 col">
        <select
          name="allow-sms"
          type="select"
          class="connected-right required"
          onchange="window.fn.save_handler(this);"
        >
          <option value="none">-- Select --</option>
          <option value="yes" <?=(isset($data['allow-sms']) && $data['allow-sms'] == "yes")? "selected='selected'":"";?>>Yes</option>
          <option value="no" <?=(isset($data['allow-sms']) && $data['allow-sms'] == "no")? "selected='selected'":"";?>>No</option>
        </select>
      </div>




      <div class="divider"></div>

      <div class="col-6"><span class="label">HOME NUMBER (optional):</span></div>
      <div class="col-6"><span class="label">WORK NUMBER (optional):</span></div>

      <div class="col-6 col">
        <input
          type="text"
          class="connected-left"
          name="home-number"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['home-number']))?$data['home-number']:"";?>"
        />
      </div>
      <div class="col-6 col">
        <input
          type="text"
          class="connected-right"
          name="work-number"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['work-number']))?$data['work-number']:"";?>"
        />
      </div>




      <hr class="divider" />

      <div class="col-3"><span class="label">SUBURB:</span></div>
      <div class="col-3"><span class="label">HOME ADDRESS (FULL ADDRESS):</span></div>
      <div class="col-3"><span class="label">POSTCODE:</span></div>
      <div class="col-3"><span class="label">STATE:</span></div>

      <div class="col-3 col">
          <input
            type="text"
            name="suburb"
            class="connected-left required"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['suburb']))?$data['suburb']:"";?>"
          />

          <!-- <select
            name="suburb"
            class="connected-left"
            onchange="window.fn.save_handler(this);"
          >
            <option value="none">-- Select --</option>
            <option value="kempsey" <?=(isset($data['suburb']) && $data['allow-sms'] == "kempsey")? "selected='selected'":"";?>>Kempsey</option>
            <option value="port macquarie" <?=(isset($data['suburb']) && $data['allow-sms'] == "port macquarie")? "selected='selected'":"";?>>Port Macquarie</option>
            <option value="coffs harbour" <?=(isset($data['suburb']) && $data['allow-sms'] == "coffs harbour")? "selected='selected'":"";?>>Coffs Harbour</option>
            <option value="taree" <?=(isset($data['suburb']) && $data['allow-sms'] == "taree")? "selected='selected'":"";?>>Taree</option>
          </select> -->
      </div>
      <div class="col-3 col">
          <input
            type="text"
            class="connected-middle required"
            name="address"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['address']))?$data['address']:"";?>"
          />
      </div>
      <div class="col-3 col">
          <input
            type="text"
            class="connected-middle required"
            name="postcode"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['postcode']))?$data['postcode']:"";?>"
          />
      </div>
      <div class="col-3 col">
          <input
            type="text"
            class="connected-right required"
            name="state"
            onkeyup="window.fn.save_handler(this);"
            value="<?=(isset($data['state']))?$data['state']:"";?>"
          />
      </div>


      <!-- Collecting government information -->

      <hr class="divider" />

      <div class="col-3"><span class="label">HIGHEST EDUCATION:</span></div>
      <div class="col-3"><span class="label">HIGHEST QUALIFICATION:</span></div>
      <div class="col-3"><span class="label">MOST SPOKEN LANGUAGE AT HOME:</span></div>
      <div class="col-3"><span class="label">OCCUPATIONAL GROUP:</span></div>

      <div class="col-3 col">
        <select
          name="highest-education"
          class="connected-left required"
          type="select"
          onchange="window.fn.save_handler(this);"
        >
          <!---->
          <option value="none">-- Select --</option>
          <option value="12" <?=(isset($data['highest-education']) && $data['highest-education'] == '12')?'selected="selected"':'';?>>Year 12 or equivalent</option>
          <option value="11" <?=(isset($data['highest-education']) && $data['highest-education'] == '11')?'selected="selected"':'';?>>Year 11 or equivalent</option>
          <option value="10" <?=(isset($data['highest-education']) && $data['highest-education'] == '10')?'selected="selected"':'';?>>Year 10 or equivalent</option>
          <option value="9" <?=(isset($data['highest-education']) && $data['highest-education'] == '9')?'selected="selected"':'';?>>Year 9 or equivalent/below</option>

        </select>
      </div>
      <div class="col-3 col">
        <select
          name="highest-qualification"
          class="connected-middle required"
          type="select"
          onchange="window.fn.save_handler(this);"
        >
          <!---->
          <option value="none">-- Select --</option>
          <option <?=(isset($data['highest-qualification']) && $data['highest-qualification'] == 'Bachelor Degree or above')?'selected="selected"':'';?>>Bachelor Degree or above</option>
          <option <?=(isset($data['highest-qualification']) && $data['highest-qualification'] == 'Diploma/Advanced Dip')?'selected="selected"':'';?>>Diploma/Advanced Dip</option>
          <option <?=(isset($data['highest-qualification']) && $data['highest-qualification'] == 'Certificate I,II,III, IV, Trade')?'selected="selected"':'';?>>Certificate I,II,III, IV, Trade</option>
          <option <?=(isset($data['highest-qualification']) && $data['highest-qualification'] == 'No non-school qualification')?'selected="selected"':'';?>>No non-school qualification</option>
        </select>
      </div>
      <div class="col-3 col">
        <input
          type="text"
          name="most-spoken-lanugage"
          class="connected-middle required"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['most-spoken-lanugage']))?$data['most-spoken-lanugage']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="number"
          name="occupational-group"
          class="connected-right required"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['occupational-group']))?$data['occupational-group']:"";?>"
        />
      </div>

      <div class="information" style="width: 100%; margin-top: 3px;">
        <small style="float: right;">To see the various occupational groups, <a href="#worker-group-numbers">click here</a>.</small>
      </div>








      <hr class="divider" />

      <div class="col-3"><span class="label">OCCUPATION:</span></div>
      <div class="col-3"><span class="label">EMPLOYER:</span></div>
      <div class="col-3"><span class="label">RELIGION:</span></div>
      <div class="col-3"><span class="label">PLACE OF WORSHIP:</span></div>

      <div class="col-3 col">
        <input
          type="text"
          name="occupation"
          class="connected-left required"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['occupation']))?$data['occupation']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          name="employer"
          class="connected-middle required"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['employer']))?$data['employer']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          name="religion"
          class="connected-middle"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['religion']))?$data['religion']:"";?>"
        />
      </div>
      <div class="col-3 col">
        <input
          type="text"
          name="place-of-worship"
          class="connected-right"
          onkeyup="window.fn.save_handler(this);"
          value="<?=(isset($data['place-of-worship']))?$data['place-of-worship']:"";?>"
        />
      </div>

  </div>
</div>
</form>
