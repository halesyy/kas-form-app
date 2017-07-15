<?php
  class Family {
      /*
      | Class containing all
      */

    // ********************************************************************

      /**/
      public $Mother = [
        'fname' => '',
        'lname' => '',
        'occupation' => '',
        'nationality' => '',
        'firstLanguage' => '',
        'employer' => '',
        'religion' => '',
        'placeOfWorship' => '',
        'homePhone' => '',
        'businessPhone' => '',
        'mobilePhone' => '',
        'address' => '',
        'town' => '',
        'state' => '',
        'postcode' => '',
        'email' => ''
      ];
      public $Father = [
        'fname' => '',
        'lname' => '',
        'occupation' => '',
        'nationality' => '',
        'firstLanguage' => '',
        'employer' => '',
        'religion' => '',
        'placeOfWorship' => '',
        'homePhone' => '',
        'businessPhone' => '',
        'mobilePhone' => '',
        'address' => '',
        'town' => '',
        'state' => '',
        'postcode' => '',
        'email' => ''
      ];
      public $Guardian = [
        'fname' => '',
        'lname' => '',
        'occupation' => '',
        'nationality' => '',
        'firstLanguage' => '',
        'employer' => '',
        'religion' => '',
        'placeOfWorship' => '',
        'homePhone' => '',
        'businessPhone' => '',
        'mobilePhone' => '',
        'address' => '',
        'town' => '',
        'state' => '',
        'postcode' => '',
        'email' => ''
      ];
      public $Conditions = [
        'motherDeceased' => '',
        'fatherDeceased' => '',
        'motherRemarried' => '',
        'fatherRemarried' => '',
        'married' => '',
        'defacto' => '',
        'parentsSeperated' => '',
        'parentsDivorced' => '',
        'single' => '',
        'guardian' => '',
        'stepParent' => '',
        'grandparent' => '',
        'courtOrder' => ''
      ];

      // Housed students in the family.
      public $Students = [

      ];


    // ********************************************************************


      /*
      | @param String:ObjectReference, Array:RecurrArray
      | Recursively iterates the given array of accesses till
      | arrives at wanted data.
      */
      public function RetrieveFrom($Access, $AccessArray) {
        $Reference = $this->$Access;
          foreach ($AccessArray as $index => $Access)
          $Reference = $Reference[$Access];
        return $Reference;
      } /**/ public function Retrieve($Access, $AccessArray) { return $this->RetrieveFrom($Access, $AccessArray); }
        /**/ public function Get($Access, $AccessArray) { return $this->RetrieveFrom($Access, $AccessArray); }



      /*
      | @param String:ObjectReference, Array:RecurrObjectLoaderArray
      | Inserts into segment of the Student object specifically.
      */
      public function Insert($Into, $InsertArray) {
        foreach ($InsertArray as $Access => $Data) {
          if (isset($this->$Into)) {
            $Reference = &$this->$Into;
            $Reference[$Access] = $Data;
          } else continue;
        }
      }

      /*
      | @param None
      | Returns the basic preview of a family with students
      | as well as parents base description.
      | *USES INVERSE PHP SCRIPT EXECUTION.
      */
      public function Preview() {
        ?>
          <div class="family-preview">
            <div class="names">
              <div class="col-lg-4">
                Mother
              </div>
              <div class="col-lg-4">
                Father
              </div>
              <div class="col-lg-4">
                Guardian
              </div>
              <div class="clear"></div>
            </div>
            <div class="students-preview">
              <?php foreach ($this->Students as $index => $Student):
                $Student = unserialize($Student);
                $Student->Preview();
              endforeach; ?>
            </div>
          </div>
        <?php
      }



  }