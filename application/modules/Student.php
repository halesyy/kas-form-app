<?php
  class Student {
      /*
      | Class containing all data for a student. Instead of creating
      | large arrays to contain the student's data that can be serialized
      | and deserialized, this is a one-way method of creating objects
      | that are more flexible then arrays and can contain manipulation
      | methods.
      */

    // ********************************************************************

      /*Stuff the user refers to as their name, phone, email*/
      public $Personal = [
        'fname' => '',
        'lname' => '',
        'mname' => '',
        'pname' => '',
        'yearToEnrol' => '',
        'yearLevel' => '',
        'gender' => '',
        'dateOfBirth' => '',
        'nationality' => '',
        'isStudent' => [
          'aboriginal' => '',
          'torresStraitIs' => ''
        ],
        'languageAtHome' => '',
        'address' => '',
        'town' => '',
        'state' => '',
        'postCode' => '',
        'livesWith' => '',
        'religion' => ''
      ];
      public $Education = [
        'hasBeenExpelled' => '',
        'hasBeenSuspended' => '',
        'hasBeenRefused' => '',
        'details' => '',
        'previousSchool' => ''
      ];
      public $Behaviour = [
        'hasDisciplineIssues' => '',
        'hasBeenArrested' => '',
        'usedAlcoholOrTobacco' => '',
        'usedIllegalDrugs' => '',
        'explain' => ''
      ];
      public $Medical = [
        'DoctorHealthFund' => [
          'private' => [
            'ambulance' => '',
            'healthFund' => '',
            'companyAndMemberId' => ''
          ],
          'medicareNumber' => '',
          'medicareExpiryDate' => '',
          'medicarePositionOnCard' => ''
        ],
        'MedicalInformation' => [
          'doctorName' => '',
          'doctorPhone' => '',
          'isImmunised' => '',
          'wears' => [
            'glasses' => '',
            'contacts' => ''
          ]
        ],
        'MedicalConditions' => [
          'has' => [
            'asthma' => '',
            'adhd' => '',
            'diabetes' => '',
            'epilepsey' => '',
            'autism' => '',
            'allergies' => '',
            'explain' => ''
          ],
          'earlyIntervention' => ''
        ]
      ];
      public $Emergency = [
        0 => [
          'name' => '',
          'phone' => '',
          'relationship' => ''
        ],
        1 => [
          'name' => '',
          'phone' => '',
          'relationship' => ''
        ]
      ];

      /*parent data and what their parents are*/
      public $HasFamily = false;
      public $FamilyID  = false;

    // ********************************************************************


      /*
      | @param String:ObjectReference, Array:RecurrArray
      | Recursively iterates the given array of accesses till
      | arrives at wanted data.
      */
      public function RetrieveFrom($Access, $AccessArray) {
        $Reference = $this->$Access;
          foreach ($AccessArray as $index => $Access)
          if (isset($Reference[$Access])) $Reference = $Reference[$Access];
          else { $Reference = false; break; }
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
      | @param Multi:Controller
      | Will set the internal variable of HasParent
      | accordingly. This is an internal reference to
      | tell if a Student Object is given a Parent/Family
      | or not.
      */
      public function SetFamily($To = 'inverse') {
        if ($To === 'inverse') {
          $this->HasFamily = !$this->HasFamily;
        } else $this->HasFamily = $To;
      }
      public function HasFamily() {
        return $this->HasFamily;
      }

      /*
      | @param None
      | Returns the basic preview of a student with really
      | basic data representing the class as itself.
      | *USES INVERSE PHP SCRIPT EXECUTION.
      */
      public function Preview() {
        ?>
          <div class="student-preview">
            <div class="name">
              <?=($this->Get('Personal', ['fname']))?>
              <?=($this->Get('Personal', ['mname']) === false || $this->Get('Personal', ['mname']) === '')? '': "{$this->Get('Personal', ['mname'])[0]}.";?>
              <?=($this->Get('Personal', ['lname']))?>
            </div>
            <hr />
            <div class="details">
              <div class="col-lg-3">
                <strong>Age</strong> <br/>
                <?=($this->Age())?>
              </div>
              <div class="col-lg-3">
                <strong>Year enrolment</strong> <br/>
                <?=($this->Get('Personal', ['yearToEnrol']))?>
              </div>
              <div class="col-lg-3">
                <strong>Year level</strong> <br/>
                <?=($this->Get('Personal', ['yearLevel']))?>
              </div>
              <div class="col-lg-3">
                <strong>Gender</strong> <br/>
                <?=($this->Get('Personal', ['gender']))?>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        <?php
      }

      /*
      | @param None
      | Uses dateOfBirth (stored in Personal[]) to calculate
      | the Students age currently.
      */
      public function Age() {
        $Date = new DateTime($this->Get('Personal', ['dateOfBirth']));
        $Now  = new DateTime();
        $Interval = $Now->diff($Date);
        #returning the Interval's year difference.
        return $Interval->y;
      }



  }
