<?php
  class APIOverseer extends APIPERSONAL {
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
        $_SESSION['parents']  = [];
        $_SESSION['students'] = [];
        $_SESSION['government-information'] = [];
        $_SESSION['parent-agreement'] = [];
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
        if (!isset($_SESSION['parents'], $_SESSION['students'])) $this->BuildFormApplicationScheme();

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
      public function Sanitize($postPart, $sanitizeVersion = false) {
        if (!isset($_POST[$postPart])) $this->Error('SANITIZE_FORM_POST_PART_NOMATCH');
        $save = []; //Where the correct form data is placed.

        if ($sanitizeVersion === false) {
          //Iterating the form data and placing into save array.
          foreach ($_POST[$postPart] as $index => $dataArray) {
            $save[$dataArray['name']] = $dataArray['value'];
          }
        } else {
          //Iterating the $_POST form data, sorting.
          foreach ($_POST[$postPart] as $index => $dataArray) {
            if (!isset($sanitizeVersion[$index]) || $sanitizeVersion[$index] != $dataArray['name']) {
              // $this->Error('SANTIZE_FORM_DATA_INCORRECT');
              break;
            } else {
              $save[$dataArray['name']] = $dataArray['value'];
            }
          }
        }
        $this->CacheFormData = $save;
        return $this;
      }



      /*
      | @param None
      | Returns the FormCacheData as an array if wanted after
      | sanitizing, since sanitization returns the internal
      | this reference object.
      */
      public function Get() {
        return $this->CacheFormData;
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
          if ( !isset($sanitizeVersion[$count]) ) $count = 0;
          if ( !$this->Types[$sanitizeVersion[$count]]($value) ) {
            $this->Error('SANITIZE_TYPE_NOT_CORRECT');
          }
          $count++;
        }
        return $this->CacheFormData;
      }


      /*
      | @param String:FirstName, String:MiddleName, String:LastName
      | Turns basic name data into names that can be represented as
      | reference names.
      */
      public function CreateFullName($fname, $mname, $lname) {
        if (!isset($mname) || empty($mname)) return "$fname $lname";
        else return "$fname {$mname[0]}. $lname";
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

      /*
      | Returns JSON data as successful.
      */
      public function JSON($array = []) {
        $default = ['success' => true];
        $array   = array_merge($array, $default);
        echo json_encode($array);
        die;
      }

  }
