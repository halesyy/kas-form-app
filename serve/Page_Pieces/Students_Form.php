<div data-id="<?=$id?>" data-type="students">
  <div class="box row formation">
    <h4 class="students-title" style="width: 100%;">
      <span id="first-name-title"><?=(isset($data['first-name']))?$data['first-name']:""?></span>
      <span id="middle-name-title"><?=(isset($data['middle-name']))?$data['middle-name']:""?></span>
      <span id="last-name-title"><?=(isset($data['last-name']))?$data['last-name']:""?></span>

      <span class="delete delete-parent" title="Delete Parent / Guardian" data-type="parent" data-id="<?=$id?>" style="float: right;">x</span>
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
      />
    </div>

  </div>
</div>
