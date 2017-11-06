<?php

    class SP_Manipulation  {


        /*
         * Nice and easy-to-call class for
         * manipulating students or parents.
         *
         * Easy to extend to other classes!
         * Since its flagged as a first-load.
         */



        /*
         * Return a fully morphic string
         * of the values supplied from a generic
         * all-round Student array.
         */
        public function student_name($student) {

          $first_name  = (isset($student['data']['first-name']))? $student['data']['first-name']: '';
          $middle_name = (isset($student['data']['middle-name']))? $student['data']['middle-name']: '';
          $last_name   = (isset($student['data']['last-name']))? $student['data']['last-name']: '';

          return "$first_name $middle_name $last_name";

        }


        /*
         * Serving the student fee costing data to the users.
         */
        public function Cycle_StudentFeeCost_Containers($Sunrise) {

          foreach ($this->studs as $index => $student) {

            print $Sunrise->Mini('Page_Pieces/Student_Fee_Cost', '..', [
              'id' => $student['id'],
              'year_level' => $student['year-level'],
              'name' => $student['name']
            ]);

          }
        }


    }
