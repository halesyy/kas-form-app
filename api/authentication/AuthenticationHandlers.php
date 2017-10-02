<?php
  $Authentication = [
    'UpdateMethodOfPaymentDetails' => function($Sunrise, $API) {
      $Family = unserialize($_SESSION['form']['families'][0]);

        if (
          !isset($Family->MethodOfPaymentDetails[$_POST['familyMember']])
          ||
          $Family->MethodOfPaymentDetails[$_POST['familyMember']]['through'] != $_POST['paymentMethod']
        ) {
          $Family->MethodOfPaymentDetails[ $_POST['familyMember'] ] = [
            'through' => $_POST['paymentMethod'],
            'fields' => [
              $_POST['fieldName'] => $_POST['fieldValue']
            ]
          ];
        } else {
          $Family->MethodOfPaymentDetails[$_POST['familyMember']]['fields'][
            $_POST['fieldName']
          ] = $_POST['fieldValue'];
        }

        print_r($Family->MethodOfPaymentDetails);

      $_SESSION['form']['families'][0] = serialize($Family);
    },
    'CheckPercentageTotal' => function($Sunrise, $API) {
      $Family = unserialize($_SESSION['form']['families'][0]);
      echo json_encode([
        'success' => true,
        'total100' => ($Family->TotalFamilyPayPercentage() == 100) ?true :false
      ]);
      $_SESSION['form']['families'][0] = serialize($Family);
    },
    'UpdateFamilyMemberPercentage' => function($Sunrise, $API) {
      //working with $Family->FamilySplitPercentages.
      $Family = unserialize($_SESSION['form']['families'][0]);
      $Family->FamilySplitPercentages[$_POST['familyMember']] = $_POST['percentage'];
      //print_r($Family->FamilySplitPercentages);
      //return json instead now,
      //indicating if family split percentage == 100 or not.
      $_SESSION['form']['families'][0] = serialize($Family);
    },
    'OtherInputsUpdate' => function($Sunrise, $API) {
      $Family = unserialize($_SESSION['form']['families'][0]);
      $Family->OtherInformation[$_POST['name']] = $_POST['value'];

      $_SESSION['form']['families'][0] = serialize($Family);
    },
    'ChangeFamilyResponsibility' => function($Sunrise, $API) {
      $Family = unserialize($_SESSION['form']['families'][0]);
      
      $Family->PaymentResponsibilities[
        $_POST['familyMember']
      ] = $_POST['is'];
      print_r($Family->PaymentResponsibilities);
      $_SESSION['form']['families'][0] = serialize($Family);
    },
    'ChangePaymentInterval' => function($Sunrise, $API) {
      $Family = unserialize($_SESSION['form']['families'][0]);
      $Family->Interval = $_POST['interval'];
      // $Family->SetInterval($_POST['interval']);
      $_SESSION['form']['families'][0] = serialize($Family);
    },
    'ChangePaymentMethod' => function($Sunrise, $API) {
      if ($_POST['method'] == 'false') $Method = '';
      else $Method = $_POST['method'];

      $Family = unserialize($_SESSION['form']['families'][0]);
      // $Family->SetMethod($Method);
      // $Family->PaymentMethod = [];
      $Family->PaymentMethod[$_POST['familyMember']] = $Method;

      $_SESSION['form']['families'][0] = serialize($Family);
    },

    'ChangeRepeatCancel' => function($Sunrise, $API) {
      $Family = unserialize($_SESSION['form']['families'][0]);

      if (!is_array($Family->RepeatTillCancelled)) {
        $Family->RepeatTillCancelled = [];
        $Family->RepeatTillCancelled[$_POST['familyMember']] = $_POST['action'];
      } else
        $Family->RepeatTillCancelled[$_POST['familyMember']] = $_POST['action'];
      // echo $_POST['action'];
      $_SESSION['form']['families'][0] = serialize($Family);
    },

    'ChangeAutomaticIncreases' => function($Sunrise, $API) {
      $Family = unserialize($_SESSION['form']['families'][0]);

      if (!is_array($Family->AutomaticPaymentIncreases)) {
        $Family->AutomaticPaymentIncreases = [];
        $Family->AutomaticPaymentIncreases[$_POST['familyMember']] = $_POST['action'];
      } else
        $Family->AutomaticPaymentIncreases[$_POST['familyMember']] = $_POST['action'];

      // $Family->AutomaticPaymentIncreases = $_POST['action'];
      // echo $_POST['action'];
      // echo $Family->AutomaticPaymentIncreases;
      $_SESSION['form']['families'][0] = serialize($Family);
    },






    'DeleteStudent' => function($Sunrise, $API) {
      $StudentID = $_POST['studentid'];
      if (is_numeric($StudentID)) {
        unset(
          $_SESSION['form']['students'][$StudentID]
        );
      }

      // A new student was added, need to reboard the family.
      if (isset($_SESSION['form']['families'][0])) {
        $Family = unserialize($_SESSION['form']['families'][0]);
        $Family->ReboardStudents();
        $_SESSION['form']['families'][0] = serialize($Family);
      }

      $API->JSON(['studentid' => $StudentID]);
    },




    //
    //   ______
    //  |  ___|
    //  | |_
    //  |  _|
    //  | |
    //  \_|
    //
    //
    'Family' => function($Sunrise, $API) {
      $Personal = $API->Sanitize('formData')->Get();

      if ($Personal['familyid'] == "false") {
        $Family = new Family;
      } else {
        $Family = unserialize($_SESSION['form']['families'][0]);
      }

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
      foreach ($_SESSION['form']['students'] as $index => $Student):
        $Student = unserialize($Student);
        $Student->SetFamily(true);
        $Student = serialize($Student);
        $Family->Insert('Students', [
          $index => $Student
        ]);
      endforeach;
      // Making sure the family array is alive in the SESSION
      // before insertion.
      if (!isset($_SESSION['form']['families'])) $_SESSION['form']['families'] = [];

      // Restoring the object to session serialized.
      if ($Personal['familyid'] == "false") {
        array_push($_SESSION['form']['families'], serialize($Family));
      } else {
        $_SESSION['form']['families'][0] = serialize($Family);
      }
      print_r($_SESSION);
    },







    //
    //     _____
    //    /  ___|
    //    \ `--.
    //     `--. \
    //    /\__/ /
    //    \____/
    //
    //
    'Student' => function($Sunrise, $API) {
      $Personal = $API->Sanitize('formData')->Get();

      // Conditionally selecting correct Student object to use.
      if ($Personal['studentid'] == "false") {
        $Student = new Student;
      } else {
        $Student = unserialize($_SESSION['form']['students'][ $Personal['studentid'] ]);
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
        'religion' => $Personal['religion'],
        'prekindy' => [
          'week1' => [
            'monday' => (isset($Personal['preKindyWk1-Monday']))? 'true': 'false',
            'tuesday' => (isset($Personal['preKindyWk1-Tuesday']))? 'true': 'false',
            'wednesday' => (isset($Personal['preKindyWk1-Wednesday']))? 'true': 'false',
            'thursday' => (isset($Personal['preKindyWk1-Thursday']))? 'true': 'false',
            'friday' => (isset($Personal['preKindyWk1-Friday']))? 'true': 'false'
          ],
          'week2' => [
            'monday' => (isset($Personal['preKindyWk2-Monday']))? 'true': 'false',
            'tuesday' => (isset($Personal['preKindyWk2-Tuesday']))? 'true': 'false',
            'wednesday' => (isset($Personal['preKindyWk2-Wednesday']))? 'true': 'false',
            'thursday' => (isset($Personal['preKindyWk2-Thursday']))? 'true': 'false',
            'friday' => (isset($Personal['preKindyWk2-Friday']))? 'true': 'false'
          ]
        ]
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
      if ($Personal['studentid'] == "false") {
        echo "new student";
        array_push($_SESSION['form']['students'], serialize($Student));
      } else {
        echo "editing student";
        $_SESSION['form']['students'][$Personal['studentid']] = serialize($Student);
      }

      // A new student was added, need to reboard the family.
      if (isset($_SESSION['form']['families'][0])) {
        $Family = unserialize($_SESSION['form']['families'][0]);
        $Family->ReboardStudents();
        $_SESSION['form']['families'][0] = serialize($Family);
      }

      print_r($Student);
    }
  ];
