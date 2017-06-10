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
        if (Router::Second() == 'get') {
          if ( isset($this->Handlers['serve'][Router::Third()]) ) {
            $this->Handlers['serve'][Router::Third()](new Sunrise);
          }
        } else if (isset($_POST['type'])) {
          if ( isset($this->Handlers['authentication'][$_POST['type']]) ) {
            $this->Handlers['authentication'][$_POST['type']](new Sunrise);
          }
        } else return false;
      }

  }
