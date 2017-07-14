<?php
  $Authentication = [
    'DeleteStudent' => function($Sunrise, $API) {
      $StudentID = $_POST['studentid'];
      if (is_numeric($StudentID)) {
        unset(
          $_SESSION['form']['students'][$StudentID]
        );
      }
      $API->JSON(['studentid' => $StudentID]);
    },
    'Family' => function($Sunrise, $API) {
      $Personal = $API->Sanitize('formData')->Get();
      // Since we don't have the convention of using [] in our
      // names to build request arrays, we have a bunch of names
      // with students ID's prefixed "studentUnderFamily", so to
      // get existance to know which family to input, we iterate
      // students section of session form and check for existance.
      $studentsUnderFamily = [];
      foreach ($_SESSION['form']['students'] as $index => &$Student):
        if (isset($Personal["studentUnderFamily{$index}"]))
        array_push($studentsUnderFamily, $index);
      endforeach;

      $Family = new Family;

      $Family->Insert('Mother', [
        'fname' => $Personal['motherFname'],
        'lname' => $Personal['motherLname'],
        'occupation' => $Personal['motherOccupation'],
        'nationality' => $Personal['motherNationality'],
        'firstLanguage' => $Personal['motherFirstLanguage'],
        'employer' => $Personal['motherEmployer'],
        'religion' => $Personal['motherReligion'],
        'placeOfWorship' => $Personal['motherPlaceOfWorship'],
        'homePhone' => $Personal['motherHomePhone'],
        'businessPhone' => $Personal['motherBusinessPhone'],
        'mobilePhone' => $Personal['motherMobilePhone'],
        'address' => $Personal['motherAddress'],
        'town' => $Personal['motherTown'],
        'state' => $Personal['motherState'],
        'postcode' => $Personal['motherPostcode'],
        'email' => $Personal['motherEmail']
      ]);
      $Family->Insert('Father', [
        'fname' => $Personal['fatherFname'],
        'lname' => $Personal['fatherLname'],
        'occupation' => $Personal['fatherOccupation'],
        'nationality' => $Personal['fatherNationality'],
        'firstLanguage' => $Personal['fatherFirstLanguage'],
        'employer' => $Personal['fatherEmployer'],
        'religion' => $Personal['fatherReligion'],
        'placeOfWorship' => $Personal['fatherPlaceOfWorship'],
        'homePhone' => $Personal['fatherHomePhone'],
        'businessPhone' => $Personal['fatherBusinessPhone'],
        'mobilePhone' => $Personal['fatherMobilePhone'],
        'address' => $Personal['fatherAddress'],
        'town' => $Personal['fatherTown'],
        'state' => $Personal['fatherState'],
        'postcode' => $Personal['fatherPostcode'],
        'email' => $Personal['fatherEmail']
      ]);
      $Family->Insert('Guardian', [
        'fname' => $Personal['guardianFname'],
        'lname' => $Personal['guardianLname'],
        'occupation' => $Personal['guardianOccupation'],
        'nationality' => $Personal['guardianNationality'],
        'firstLanguage' => $Personal['guardianFirstLanguage'],
        'employer' => $Personal['guardianEmployer'],
        'religion' => $Personal['guardianReligion'],
        'placeOfWorship' => $Personal['guardianPlaceOfWorship'],
        'homePhone' => $Personal['guardianHomePhone'],
        'businessPhone' => $Personal['guardianBusinessPhone'],
        'mobilePhone' => $Personal['guardianMobilePhone'],
        'address' => $Personal['guardianAddress'],
        'town' => $Personal['guardianTown'],
        'state' => $Personal['guardianState'],
        'postcode' => $Personal['guardianPostcode'],
        'email' => $Personal['guardianEmail']
      ]);
      $Family->Insert('Conditions', [
        'motherDeceased' => (isset($Personal['motherDeceased'])? 'true': 'false'),
        'fatherDeceased' => (isset($Personal['fatherDeceased'])? 'true': 'false'),
        'motherRemarried' => (isset($Personal['motherRemarried'])? 'true': 'false'),
        'fatherRemarried' => (isset($Personal['fatherRemarried'])? 'true': 'false'),
        'married' => (isset($Personal['married'])? 'true': 'false'),
        'defacto' => (isset($Personal['defacto'])? 'true': 'false'),
        'parentsSeperated' => (isset($Personal['parentsSeperated'])? 'true': 'false'),
        'parentsDivorced' => (isset($Personal['parentsDivorced'])? 'true': 'false'),
        'single' => (isset($Personal['single'])? 'true': 'false'),
        'guardian' => (isset($Personal['guardian'])? 'true': 'false'),
        'stepParent' => (isset($Personal['stepParent'])? 'true': 'false'),
        'grandparent' => (isset($Personal['grandparent'])? 'true': 'false'),
        'courtOrder' => (isset($Personal['courtOrder'])? 'true': 'false')
      ]);
      foreach ($studentsUnderFamily as $StudentID):
        if (isset($_SESSION['form']['students'][$StudentID])) {
          $Family->Insert('Students', [
            $StudentID => $_SESSION['form']['students'][$StudentID]
          ]);
        } else {
          //
        }
      endforeach;
      print_r($Family);
    },
    'Student' => function($Sunrise, $API) {
      $Personal = $API->Sanitize('formData')->Get();

      // Conditionally selecting correct Student object to use.
      if (is_numeric($Personal['studentid'])) {
        $Student = unserialize($_SESSION['form']['students'][ $Personal['studentid'] ]);
      } else {
        $Student = new Student;
      }

      $Student->Insert('Personal', [
        'fname' => $Personal['fname'],
        'lname' => $Personal['lname'],
        'mname' => $Personal['mname'],
        'pname' => $Personal['pname'],
        'yearToEnrol' => $Personal['yearToEnrol'],
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

      // Restoring the object to session serialized.
      if (is_numeric($Personal['studentid'])) {
        $_SESSION['form']['students'][$Personal['studentid']] = serialize($Student);
      } else {
        array_push($_SESSION['form']['students'], serialize($Student));
      }
      print_r($_SESSION);
    }
  ];
