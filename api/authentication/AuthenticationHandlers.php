<?php
  $Authentication = [
    'NewStudent' => function($Sunrise, $API) {
      $Personal = $API->Sanitize('formData')->Get();
      $Student = new Student;
      $Student->Insert('Personal', [
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
      $Student->Insert('Education', [
        'hasBeenExpelled' => (isset($Personal['hasBeenExpelled']))? 'true': 'false',
        'hasBeenSuspended' => (isset($Personal['hasBeenSuspended']))? 'true': 'false',
        'hasBeenRefused' => (isset($Personal['hasBeenRefused']))? 'true': 'false',
        'details' => $Personal['pleaseExplainEducation'],
        'previousSchool' => $Personal['previousSchool']
      ]);
      $Student->Insert('Behaviour', [
        'hasDisciplineIssues' => (isset($Personal['hasDisciplineIssues']))? 'true': 'false',
        'hasBeenArrested' => (isset($Personal['hasBeenArrested']))? 'true': 'false',
        'usedAlcoholOrTobacco' => (isset($Personal['usedAlcoholOrTobacco']))? 'true': 'false',
        'usedIllegalDrugs' => (isset($Personal['usedIllegalDrugs']))? 'true': 'false',
        'explain' => $Personal['pleaseExplainBehaviour']
      ]);
      $Student->Insert('Medical', [
        'DoctorHealthFund' => [
          'private' => [
            'ambulance' => (isset($Personal['privateAmbulance']))? 'true': 'false',
            'healthFund' => (isset($Personal['privateHealthFund']))? 'true': 'false',
            'companyAndMemberId' => $Personal['pleaseExplainPrivateHealth']
          ],
          'medicareNumber' => $Personal['medicareNumber'],
          'medicareExpiryDate' => $Personal['medicareExpiry'],
          'medicarePositionOnCard' => $Personal['medicarePositionOnCard']
        ],
        'MedicalInformation' => [
          'doctorName' => $Personal['doctorName'],
          'doctorPhone' => $Personal['doctorPhone'],
          'isImmunised' => $Personal['immunised'],
          'wears' => [
            'glasses' => (isset($Personal['wearsGlasses']))? 'true': 'false',
            'contacts' => (isset($Personal['wearsContacts']))? 'true': 'false'
          ]
        ],
        'MedicalConditions' => [
          'has' => [
            'asthma' => (isset($Personal['hasAsthma']))? 'true': 'false',
            'adhd' => (isset($Personal['hasADHD']))? 'true': 'false',
            'diabetes' => (isset($Personal['hasDiabetes']))? 'true': 'false',
            'epilepsey' => (isset($Personal['hasEpilepsey']))? 'true': 'false',
            'autism' => (isset($Personal['hasAutism']))? 'true': 'false',
            'allergies' => (isset($Personal['hasAllergies']))? 'true': 'false',
            'explain' => $Personal['pleaseExplainCondition']
          ],
          'earlyIntervention' => (isset($Personal['earlyIntervention']))? 'true': 'false'
        ]
      ]);
      $Student->Insert('Emergency', [
        0 => [
          'name' => $Personal['emergencyName1'],
          'phone' => $Personal['emergencyPhone1'],
          'relationship' => $Personal['emergencyRelationship1']
        ],
        1 => [
          'name' => $Personal['emergencyName2'],
          'phone' => $Personal['emergencyPhone2'],
          'relationship' => $Personal['emergencyRelationship2']
        ]
      ]);
    }
  ];
