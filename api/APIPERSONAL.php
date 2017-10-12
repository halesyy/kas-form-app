<?php
  class APIPERSONAL {

      public function get_new_parent(Sunrise $Sunrise) {
        $ID   = hash('gost', rand(0, 1000000));
        $Form = $Sunrise->Mini('Page_Pieces/Parent_Guardians_Form', '..', [
          'id' => $ID
        ]);
        array_push($_SESSION['parents'], [
          'id'   => $ID,
          'data' => []
        ]);
        return [
          'id'   => $ID,
          'form' => $Form
        ];
      }


      public function &find_parent($id, $nofind_die = false) {
        foreach ($_SESSION['parents'] as $index => &$parent) {
          if ($id == $parent['id']) {
            return $parent;
          }
        }
        if ($nofind_die) die('Couldn\'t find ID, ending self.');
      }

  }
