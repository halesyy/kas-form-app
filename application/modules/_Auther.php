<?php
  class Auther {
    /*
     * Named similar to "Author," trying to force integrity
     * and making sure that the data is from a real source.
     * Auther takes the Family & Students array and makes sure
     * any entires fill requirements.
     */

     public $student_crammer = [
       'first-name', 'last-name',
       'year-starting', 'date-of-birth', 'year-level',
       'has-health-fund',
       'doctors-name', 'doctors-phone',
       'immunised'
     ];
     public $parent_crammer = [
       'email',
       'relationship-to-student', 'relationship-status',
       'title', 'first-name', 'last-name',
       'phone-number', 'allow-sms',
       'suburb', 'address'
     ];

     public $needs = '';

     public function Force($session) {
       /*
        * Students are in $_SESSION['students'] []
        * Parents  are in $_SESSION['parents']  []
        */

        $students = $session['students'];
        $parents  = $session['parents'];

        $students = $this->Students($students);
        $parents  = $this->Parents($parents);

        // var_dump($students);
        // var_dump($parents);

        if ($students === false || $parents === false) return false;
        else return true;

     }

     public function Students($students) {
       foreach ($students as $id => $student):
         $has = array_keys($student['data']);
         foreach ($this->student_crammer as $needs) {
           if (in_array($needs, $has) === false) { $this->needs = "Students $needs"; return false; }
         }

       endforeach;
       return true;
     }
     public function Parents($parents) {
       foreach ($parents as $id => $parent):
         $has = array_keys($parent['data']);
         foreach ($this->parent_crammer as $needs) {
           if (in_array($needs, $has) === false) { $this->needs = "Parents $needs"; return false; }
         }

       endforeach;
       return true;
     }



  }
