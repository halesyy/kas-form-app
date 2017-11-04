<?php
  class APIPERSONAL {

      public $conversion_s = ['students' => 'students', 'parent-guardians' => 'parents'];
      public $conversion_f = ['students' => 'Students_Form', 'parent-guardians' => 'Parent_Guardians_Form'];

      public function create_new_object(Sunrise $Sunrise, $type) {
        $ID   = hash('gost', rand(0, 1000000));
        $Form = $Sunrise->Mini("Page_Pieces/{$this->conversion_f[$type]}", '..', [
          'id' => $ID,
          'first' => false
        ]);
        array_push($_SESSION[ $this->conversion_s[$type] ], [
          'id'   => $ID,
          'data' => []
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
