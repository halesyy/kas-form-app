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
      public $personalReference = [
        'fname' => '',
        'lname' => '',
        'mname' => '',
        'pname' => '',
        'email' => '',
        'homephone' => '',
        'mobilephone' => '',
        'enrolYear' => '',
        'gender' => '',
        'dateOfBirth' => '',
        'nationality' => '',
        'isStudent' => [
          'aboriginal' => '',
          'torresStraitIs' => ''
        ],
        'languageAtHome' => ''
      ];
      public $behaviour = [
        'disciplineDifficulties' => '',
        'arrested' => '',
        'alcoholOrTobacco' => '',
        'illegalDrugs' => '',
        'details' => ''
      ];

    // ********************************************************************



  }
