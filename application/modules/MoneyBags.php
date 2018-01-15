<?php

    class MoneyBags extends SP_Manipulation {

        /*
         * NOTE named after Mr Money Mustache.
         * MoneyBags is a class devoted to precise
         * fee calculation for the Enrolment App suite.
         * Lots of love to Sir MoneyBags for the beautiful
         * mathematics!
         */

        // ****************************************************

          public $errors = [];
          public $studs; //[id=>ID,data=>[year-level=>YEAR-LEVEL]]

        // ****************************************************

          public $terms_remaining;

          /*
           * Financial-related variables.
           * Numerative arrays refer to the year-level
           * they serve data for. -1=prekin, 0=kindy, so
           * forth.
           */

          // Collections are the total of all the students
          // data combined.
          public $stud_tuition_collection = [];
          public $stud_compulsory_collection = [];
          public $stud_subject_collection = [];

          public $stud_total_collection   = [];

          public $building_levy = 180;
          public $tuition = [
            -1 => 0,

            0 => 1025,
            1 => 1025,
            2 => 1025,
            3 => 1025,
            4 => 1025,
            5 => 1025,
            6 => 1025,

            7 => 1025,
            8 => 1025,
            9 => 1225,
            10 => 1225,
            11 => 1330,
            12 => 1330
          ];
          public $compulsory = [
            -1 => 0,

            0 => 700,
            1 => 700,
            2 => 700,
            3 => 700,
            4 => 700,
            5 => 700,
            6 => 700,

            7 => 715,
            8 => 715,
            9 => 715,
            10 => 715,
            11 => 740,
            12 => 740
          ];
          public $subject = [
            -1 => 0,

            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,

            7 => 305,
            8 => 305,
            9 => 475,
            10 => 475,
            11 => 680,
            12 => 680
          ];
          public $total = [
            -1 => 0,

            0 => 1725,
            1 => 1725,
            2 => 1725,
            3 => 1725,
            4 => 1725,
            5 => 1725,
            6 => 1725,

            7 => 2045,
            8 => 2045,
            9 => 2415,
            10 => 2415,
            11 => 2750,
            12 => 2750
          ];


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

            // Synchronous variables.
            $this->terms_remaining = (4 -  floor((date('z') / (365 / 4)))   );

            if (is_array($studs)) {

                /*the general form for studs (students)*/
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

                        /*Financial manipulation can commense, we have all needed data.*/
                        array_push($this->stud_tuition_collection,
                          $this->tuition[$yl]
                        );
                        array_push($this->stud_compulsory_collection,
                          $this->compulsory[$yl]
                        );
                        array_push($this->stud_subject_collection,
                          $this->subject[$yl]
                        );
                        array_push($this->stud_total_collection,
                          $this->total[$yl]
                        );


                        /*Pushing to the extract storage array.*/
                        array_push($studs_extract, [
                          'id'         => $id,
                          'year_level' => $yl,
                          'name'       => $this->student_name($student),

                          'base_annual' => $this->total[$yl]
                        ]);

                    }
                }

                if ($debug) { echo "<pre>", print_r($studs_extract) ,"</pre>"; echo "<pre>", print_r($this->errors) ,"</pre>"; }

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
                $year_level = $student['year_level'];
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






        /*
         *
         *
         *
         */
        public function base_annual_costings() {

            $total = $this->base_total();
            $total += $this->building_levy;

            return $total;

        }

        public function base_termed_costings() {

            $total = $this->base_total();

            // Implementing new total.
            $total  = $this->incorporate_term($total);
            $total += $this->building_levy;

            return $total;

        }

        /*
         * CLEAR:
         * THIS IS SIMPLY THE MOST BASIC
         * MANIP TECH FOR STUDENT.
         * ------------------------------------
         * Simply returns the default chart
         * refernece for the stud(ent).
         */
        public function base_total() {

            $tuition    = array_sum($this->stud_tuition_collection);
            $compulsory = array_sum($this->stud_compulsory_collection);
            $subject    = array_sum($this->stud_subject_collection);

            return ($tuition + $compulsory + $subject);

        }

        /*
         * Segmentation of code that will calculate the
         * total discount done from the year level reference.
         * -----------------------------------
         * The $this->stud_tuition_collection is inputted from
         * year-level of HIGH->LOW, therefore the data is
         * default in correct order, but the data is then
         * purified further by sorting the array.
         * -----------------------------------
         * Returns the total family discount amount for the
         * set of tuition fees.
         */
        public function family_discount() {
            $tuition = $this->stud_tuition_collection;
            rsort($tuition);
            // echo "<pre>", print_r($tuition) ,"</pre>";

            /*iterating on the values to sort into correct multiplying range*/
            $family_discount_values = [];
            $i = 1; foreach ($tuition as $index => $value):
              if ($i == 1)       $discount = 0.00;
              else if ($i > 4)   $discount = 0.60;
              else               $discount = ($i -1) *0.20;

              array_push($family_discount_values,
                $value * $discount
              );
            $i++;   endforeach;

            $total_family_discount = array_sum($family_discount_values);
            return $this->incorporate_term($total_family_discount);
        }


        /*
         * Incorporates the information to do with terming
         * into the MoneyBags class, allows easy integration
         * of term functionality when needed.
         */
        public function incorporate_term($val) {
            $ret = ($val / 4) * $this->terms_remaining;
            return round($ret);
        }



        /*
         * Returns the total cost for enrolment
         * AFTER discoutns have been removed from the
         * total.
         */
        public function termed_total_after_discounts() {
          $termed_total = $this->base_termed_costings();

          $termed_total -= ( $this->family_discount() );

          return $termed_total;
        }







    }
