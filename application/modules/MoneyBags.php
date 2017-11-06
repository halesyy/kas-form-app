<?php

    class MoneyBags extends SP_Manipulation {

        /*
         * NOTE named after Mr Money Mustache.
         * MoneyBags is a class devoted to precise
         * fee calculation for the Enrolment App suite.
         */

        // ****************************************************

          public $errors = [];
          public $studs;

        // ****************************************************

        /*
         * Constructor requires basic information in a
         * numerative, assosiative array.
         * The assosiative keys must only include:
         *   -student id ('id')
         *   -data['year-level'] (-1~12)
         * If left alone, can later feed using other
         * options, just instanciate alone.
         * ----------------------------
         * Converts the raw input into easy-to-manip
         * values for the class later.
         */
        public function __construct($studs = false, $debug = false) {

            if (is_array($studs)) {

                $studs_extract = [];
                foreach ($studs as $index => $student) {
                    $id = (isset($student['id']))?$student['id']:false;
                    $yl = (isset($student['data']['year-level']))?$student['data']['year-level']:false;
                    if ($id === false || $yl === false) {

                      array_push($this->errors,
                        "Student {$this->student_name($student)} does not have a year level to determine their fees!"
                      );

                    }
                    else {
                      array_push($studs_extract, [
                        'id' => $id,
                        'year-level' => $yl,
                        'name' => $this->student_name($student)
                      ]);
                    }
                }

                if ($debug) {

                    echo "<pre>", print_r($studs_extract) ,"</pre>";
                    echo "<pre>", print_r($this->errors) ,"</pre>";

                }

                $this->studs = $studs_extract;
                $this->sort_studs();

            }//

        }



        /*
         * Pairing error functions, determines
         * whether or not there were financial
         * data errors.
         * Error prints out the errors.
         */
        public function error() {
            if (!$this->no_error()) {
                foreach ($this->errors as $error) {
                    echo "<div class='error'>{$error}</div>";
                }
            }
        }
        public function no_error() {
          return (count($this->errors) == 0)?true: false;

        }





        /*
         * First function called for financial
         * tollerance. Sorts by year-levle from
         * NOTE high -> low
         */
        public function sort_studs() {

            // Store by id=> year-level.
            $sorted_studs = [];
            foreach ($this->studs as $index => $student) {

                $id         = $student['id'];
                $year_level = $student['year-level'];
                $sorted_studs[$id] = $year_level;

            }

            // Sort by value descending in assosiative array.
            ksort($sorted_studs);

            // With sorted id=> year-level, need to check
            // inside of the current studs to arrange in order.
            $new_studs = [];
            foreach ($sorted_studs as $id => $year_level) {

                foreach ($this->studs as $index => $student) {
                  if ($student['id'] == $id) array_push($new_studs, $student);
                }

            }

            $this->studs = $new_studs;


        }







        }
