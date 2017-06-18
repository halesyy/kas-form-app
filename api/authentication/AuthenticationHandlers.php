<?php
  $Authentication = [
    'NewStudent' => function($Sunrise, $API) {
      $Student = new Student;

      $Personal = $API->Sanitize('formData')->Get();

      $Student->InsertPersonal([
        'fname' => $Personal['fname'],
        'lname' => $Personal['lname'],
        'mname' => $Personal['mname'],
        'pname' => $Personal['pname'],
        'enrolYear' => $Personal['yearToEnrol'],
        'yearLevel' => $Personal['yearLevel'],
        'gender' => $Personal['gender'],
        'dateOfBirth' => $Personal['dateOfBirth'],
        'nationality' => $Personal['nationality'],
        'isStudent' => [
          'aboriginal' => (isset($Personal['isAboriginal']))? 'true': 'false',
          'torresStraitIs' => (isset($Personal['isTorresStraitIs']))? 'true': 'false'
        ],
        'languageAtHome' => $Personal['languageAtHome'],
        'address' => $Personal['address'],
        'town' => $Personal['town'],
        'state' => $Personal['state'],
        'postCode' => $Personal['postCode'],
        'livesWith' => $Personal['livesWith'],
        'religion' => $Personal['religion']
      ]);
      $Student->InsertBehaviour([
        'hasDisciplineIssues' => (isset($Personal['hasDisciplineIssues']))? 'true': 'false',
        'hasBeenArrested' => (isset($Personal['hasBeenArrested']))? 'true': 'false',
        'usedAlcoholOrTobacco' => (isset($Personal['usedAlcoholOrTobacco']))? 'true': 'false',
        'usedIllegalDrugs' => (isset($Personal['usedIllegalDrugs']))? 'true': 'false',
        'explain' => $Personal['pleaseExplainBehaviour']
      ]);

      echo $Student->Personal('fname');
      echo ' - ';
      echo $Student->Personal('lname');
      echo ' - ';
      echo $Student->Personal('mname');
      echo ' - ';
      echo $Student->Personal('pname');
      echo ' - ';
      echo $Student->Behaviour('explain');
    }
  ];
