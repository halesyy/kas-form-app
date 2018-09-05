<?php
  /*
   = Functions which are accessible from the $api variable
   = in the Get.php and Post.php area for recycleability.
   */

  class APIPERSONAL {

      public $conversion_s = ['students' => 'students', 'parent-guardians' => 'parents'];
      public $conversion_f = ['students' => 'Students_Form', 'parent-guardians' => 'Parent_Guardians_Form'];

      // Where the GOST algorithm is used to create a new ID unique
      // to the rest of them for the session handling.
      public function create_new_object(Sunrise $Sunrise, $type) {
        $ID   = hash('gost', rand(0, 1000000));
        array_push($_SESSION[ $this->conversion_s[$type] ], [
          'id'   => $ID,
          'data' => [
            'address' => (isset($_SESSION['parents'][0]['data']['address']))?$_SESSION['parents'][0]['data']['address']:""
          ]
        ]);
        $Form = $Sunrise->Mini("Page_Pieces/{$this->conversion_f[$type]}", '..', [
          'id' => $ID,
          'first' => false
        ]);
        return [
          'id'   => $ID,
          'form' => $Form
        ];
      }


      public function &find_object($id, $nofind_die, $type) {
        foreach ($_SESSION[ $this->conversion_s[$type] ] as $index => &$Object) {
          if ($id == $Object['id']) {
            return $Object;
          }
        }
        if ($nofind_die) die('Couldn\'t find ID, ending self.');
      }

      public function find_object_id($id, $type) {
        foreach ($_SESSION[ $this->conversion_s[$type] ] as $index => $Object) {
          if ($id == $Object['id']) {
            return $index;
          }
        }
        return false;
      }

  }
