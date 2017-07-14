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
      | @param Object:Parent
      | Going to insert the parent object into the class
      | as a dependancy.
      */
      public function InsertParent(Parent $Parent) {

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


  }
