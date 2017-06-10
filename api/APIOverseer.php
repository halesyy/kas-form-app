<?php
  class APIOverseer {
      /*
      | ==================================================
      | The API Overseer is the method which gets loaded
      | with serve handlers. One being the GET part of the
      | API and the other being the POST authentication
      | part.
      | ==================================================
      |
      */

    // *****************************************************

      protected $Handlers = [];
      protected $CacheFormData = [];

    // *****************************************************

      /*
      | @param ClosureObject:ServeCallables, ClosureObject:AuthCallables
      | Takes in both parts of the API, POST and GET and mixes them into
      | the protected $Handlers variable internally.
      | Sorts the incoming request and replies with the appropriate method
      | dictated from internal conditioning.
      */
      public function __construct($Serve, $Authentication) {
        $this->Handlers['serve'] = $Serve;
        $this->Handlers['auth']  = $Authentication;
      }


      /*
      | Called when there's no SESSION[application], time to build it for
      | the client! Contains all the data the user has submitted for the
      | application/register so far.
      */
      protected function BuildFormApplicationScheme() {
        $_SESSION['form'] = [
          'students' => [
            /*
            [0] => [
              'firstName' => 'Jack',
              'lastName' => 'Hales',
              'middleName' => 'Geoffery',
              'prefName' => 'Jek',
              'email' => 'halesyy@gmail.com',
              'homePhone' => '65628442',
              'mobilePhone' => '0430525909',
              'enrolYear' => '11/2018',
              'gender' => 'Male',
              'dateOfBirth' => '15.05.2001',
              'placeOfBirth' => 'Sydney, Australia',
              'nationality' => 'Whiteaf',
              'ethnicity' => [
                'aboriginal' => false,
                'torres' => false
              ],
              'homeLanguage' => 'Very English',
              'behaviouralInformation' => [
                'hasHad' => [
                  'disciplineDifficulties' => false,
                  'arrested' => false,
                  'alcoholOrTobacco' => false,
                  'drugs' => false,
                  // :D
                  'details' => 'He\'s a very good boy!'
                ]
              ],
              'emergencyDetails' => [
                '0' => [
                  'name' => 'Christian Aquilina',
                  'telephone' => '123123123',
                  'relationship' => 'Uncle'
                ],
                '1' => [
                  'name' => 'Elon Musk',
                  'telephone' => '321321321',
                  'relationship' => 'Dad'
                ]
              ],
              'medicalConditions' => [
                'has' => [
                  'asthma' => true,
                  'adhd' => false,
                  'diabetes' => false,
                  'epilepsy' => false,
                  'autism' => false,
                  'allergies' => true,
                  'details' => 'Asthma is not constant and never acts up. Allergies aren\'t often either. Has plans for both from Doctor.',
                  'earlyIntervention' => true
                ]
              ],
              'medicalInformation' => [
                'doctorsName' => 'Ruben Kurilowichasdjaiosjdoasd',
                'doctorsPhone' => '16121243124',
                'immunised' => true,
                'wears' => [
                  'glasses' => true,
                  'contacts' => false
                ]
              ],
              'educationalInformation' => [
                'previousSchool' => 'East Kempsey Public School',
                'hasBeen' => [
                  'expelled' => false,
                  'suspended' => true,
                  'refused' => false
                  'details' => 'Suspended for a joke!'
                ] HAS BEEN
              ],
              'characterReference' => [
                'name' => 'What Is This',
                'occupation' => 'What Huh Who',
                'telephone' => 'I Really Don\'t Know'
              ],
              'healthInformation' => [
                'has' => [
                  'privateHealthInsurance' => false,
                  'privateAmbulance' => false,
                  'ifDoes' => [
                    'doesnt',
                    ...
                    'company' => 'Jeks Sandwiches Co',
                    'memberId' => '123123',
                    'medicareNumber' => '123123123123',
                    'expiryDate' => '12.2017',
                    'positionOnCard' => '123123123'
                  ]
                ]
              ]
            ] . . . END OF STUDENT
            */
          ]
        ];
      }


      /*
      | @Param none
      | The trigger for the API to use it's internal method to either
      | call a Serve or Auth function.
      | =============================================================
      | When the Router dictates that the second segment of the URI
      | is 'get', then we can open up the public GET API.
      | When there's a POST request where type=isset, we open up the
      | POST API for usage.
      */
      public function Trigger() {
        if (!isset($_SESSION['form'])) $this->BuildFormApplicationScheme();

        if (Router::Second() == 'get') {
          if ( isset($this->Handlers['serve'][Router::Third()]) ) {
            $this->Handlers['serve'][Router::Third()](new Sunrise, $this);
          }
        } else if (isset($_POST['type'])) {
          if ( isset($this->Handlers['auth'][$_POST['type']]) ) {
            $this->Handlers['auth'][$_POST['type']](new Sunrise, $this);
          }
        } else return false;
      }


      /*
      | @param String:PostAccessor, Array:StrictApplier
      | Sanitizing the given post "part" from $_POST[part], sorting
      | the jQuery "sanitizeArray" method into an appropriate array
      | safely so there's no manipulation client side being hacky.
      */
      public function Sanitize($postPart, $sanitizeVersion) {
        if (!isset($_POST[$postPart])) $this->Error('SANITIZE_FORM_POST_PART_NOMATCH');
        $save = []; //Where the correct form data is placed.
        //Iterating the $_POST form data, sorting.
        foreach ($_POST[$postPart] as $index => $dataArray) {
          if ($sanitizeVersion[$index] != $dataArray['name']) $this->Error('SANTIZE_FORM_DATA_INCORRECT');
          else {
            $save[$dataArray['name']] = $dataArray['value'];
          }
        }
        $this->CacheFormData = $save;
        return $this;
      }


      /*
      | @param Array:FromSanitizeMethod, Array:StrictTypeApplier
      | Uses the return from the previous Sanitize array to sort
      | the array by value types to specify and further authenticate
      | your form data.
      */
      private $Types = [ //quite limited.
        'string' => 'is_string',
        'integer' => 'is_numeric',
        'str' => 'is_string',
        'int' => 'is_numeric'
      ];
      public function Types($sanitizeVersion) {
        $count = 0;
        //Looping cached form data and type checking from
        //referencing internal $this->Types variable.
        foreach ($this->CacheFormData as $name => $value) {
          if ( !$this->Types[$sanitizeVersion[$count]]($value) ) {
            $this->Error('SANITIZE_TYPE_NOT_CORRECT');
          }
          $count++;
        }
        return $this->CacheFormData;
      }


      /*
      | Reports an API issue in JSON format.
      */
      public function Error($message) {
        echo json_encode([
          'success' => 'false',
          'message' => $message
        ]);
        die;
      }

  }
