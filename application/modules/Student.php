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
      public $PersonalReference = [
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
      public $Behaviour = [
        'hasDisciplineIssues' => '',
        'hasBeenArrested' => '',
        'usedAlcoholOrTobacco' => '',
        'usedIllegalDrugs' => '',
        'explain' => ''
      ];

    // ********************************************************************


      /*
      | @param Array:InseringData
      | The students personal data, inserts recurringly data given
      | till all in - helps to segreagate certain areas of the Student
      | objects.
      */
      public function InsertPersonal($InsertArray) {
        foreach ($InsertArray as $access => $data) {
          if (isset($this->PersonalReference[$access])) {
            $this->PersonalReference[$access] = $data;
          } else continue;
        }
      }
      /*GET method for the personal reference data*/
      public function Personal($access, $further = false) {
        if (isset($this->PersonalReference[$access]) || !empty($this->PersonalRefernece[$access])) {
          if ($further === false) return $this->PersonalReference[$access];
          else return $this->PersonalReference[$access][$further];
        } else return false;
      }



      /*
      | @param Array:InseringData
      | The students behavioural data, inserts recurringly data given
      | till all in - helps to segreagate certain areas of the Student
      | objects.
      */
      public function InsertBehaviour($InsertArray) {
        foreach ($InsertArray as $access => $data) {
          if (isset($this->Behaviour[$access])) {
            $this->Behaviour[$access] = $data;
          } else continue;
        }
      }
      /*GET method for the personal reference data*/
      public function Behaviour($access, $further = false) {
        if (isset($this->Behaviour[$access]) || !empty($this->Behaviour[$access])) {
          if ($further === false) return $this->Behaviour[$access];
          else return $this->Behaviour[$access][$further];
        } else return false;
      }

  }
