<?php
  class Sunrise {

      /*
      | Sunrise is a simple Rendering engine I'm
      | building to be lightweight and incorporate
      | important rendering features for building
      | dynamic documents from PHP-retrieved data.
      */

    // *******************************************

      public $ServeDirectory = 'serve/';
      public $Content = '';
      public $Cache = [];

    // *******************************************



      /*
      | @param String:ServeFileName, Array:Data, String:PrependToString
      | 1. Will use the internal class method to
      |    safely retrieve data.
      | 2. Using another internal method to implement
      |    user data into document.
      */
      public function Render($fileName, $fileData = [], $prepend = false, $cache = false) {
        $dir = $this->ServeDirectory;
        #//prepend is used if the require for example API isn't in the entry.php
        #//file, and anchor is different.
        if ($cache !== false)   $this->Cache = $cache;
        if ($prepend !== false) $dir = $prepend.'/'.$dir;
        $dir .= $fileName.'.php';
        $this->RetrieveFileContent($dir);
        $this->ImportVariables($fileData);
        $this->SortTriggers();
        $this->SessionSifter();

        print $this->Content;
      }

      /*
      | @param String:MiniFileName
      | Meant for areas in forms that are dynamic and need to be loaded
      | in using PHP and HTML combined. Will use an output buffer to render
      | and return the data.
      */
      public function Mini($fileName, $prepend = false) {
        $dir = "serve/{$fileName}.php";
        $dir = ($prepend)? $prepend.'/'.$dir: $dir;
        ob_start();
          include( $dir );
        return ob_get_clean();
      }


      /*
      | @param None:UsesInternalContent
      | Looks for triggers for shorthand development. Usually
      | used to reference cleaner code and build bootstrap grids.
      */
      public $TriggerConversions = [
        'whole'  => 'col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-col',
        'half'   => 'col-lg-6 col-md-6 col-sm-6 col-xs-12 custom-col',
        'third'  => 'col-lg-4 col-md-4 col-sm-4 col-xs-12 custom-col',
        'third-expands' => 'col-lg-4 col-md-6 col-sm-12 col-xs-12 custom-col',
        'third-expands-end' => 'col-lg-4 col-md-12 col-sm-12 col-xs-12 custom-col',
        'fourth' => 'col-lg-3 col-md-3 col-sm-6 col-xs-12 custom-col'
      ];
      public function SortTriggers() {
        $Content  = $this->Content;
        $lines = explode("\n", $Content);
        foreach ($lines as $index => $line) {
          // Managing for "triggers"
            if (isset(trim($line)[0]) && trim($line)[0] == '@') {
              $trigger = ltrim(explode(' ', trim($line))[0], '@'); //@trim => trim.
              // Going to neaten this up when I get some free time for
              // creating a better flow for development.
              if ($trigger == 'countries') {
                $lines[$index] = $this->Mini('form/Countries', '..');#// Generating the line to evaluate to a country selector.
              } else if ($trigger == 'gender') {
                $lines[$index] = $this->Mini('form/Gender', '..');#// Gender selector.
              } else if ($trigger == 'yearlevel') {
                $lines[$index] = $this->Mini('form/YearLevel', '..');#// Year level selector.
              } else if ($trigger == 'yeartoenrol') {
                $lines[$index] = $this->Mini('form/YearToEnrol', '..');#// The year to enrol selector, will be dynamic later.
              } else if ($trigger == '//') {
                $lines[$index] = "</div>";
              } else if (isset($this->TriggerConversions[$trigger])) {
                // @fourth -> <div class="col-lg-3" ...>
                $colstr = $this->TriggerConversions[$trigger];
                $lines[$index] = "\n<div class='{$colstr}'>";
              } else {
                //Remove -connection and get the TriggerConversions from the public variable.
                if (isset($this->TriggerConversions[str_replace('-connection', '', $trigger)])) $colstr = $this->TriggerConversions[str_replace('-connection', '', $trigger)];
                $lines[$index] = "\n</div><div class='{$colstr}'>";
              }
            }

          // Managing for "packets".
            if (preg_match('/\[.*\]/', trim($line))) {
              $line    = rtrim(ltrim(trim($line), '['), ']');
              $pieces  = explode(' ', $line);
              $trigger = $pieces[0];
              if ($trigger == 'label') { #//TO REFINE. SEPERATE METHODS IN ANOTHER FILE.
                $line   = preg_replace('/label \"(.*)\" for \"(.*)\"/', '$1::::$2', $line);
                $pieces = explode('::::', $line);
                if (count($pieces) != 2) die('Sunrise engine err: Not two preg replace eval zones');
                $pieces[0] = str_replace('*', "<span class='required'>*</span>", $pieces[0]); #//turns * into class given * for requirement styling
                // Push packet after management.
                $lines[$index] = "\n<label for='{$pieces[1]}'>{$pieces[0]}</label>";
              }
            }
        }

        // Push content after finishing rebuilding &
        // reconstructing everything.
        $this->Content = implode("\n", $lines);
      }



      /*
      | @param String:FileDirectory
      | Will serve the file given to it safely
      | making sure no errors are encountered.
      | If found, returns the file data as well
      | as sets it in the public variable $Content.
      */
      public function RetrieveFileContent($fileName) {
        if (is_file($fileName)) {
            ob_start();
            include($fileName);
            $Content = ob_get_clean();
          $this->Content = $Content;
          return $Content;
        } else die('File not found: '.$fileName);
      }



      /*
      | @param Array:FileData
      | Uses the internal buffered $Content string
      | as the anchor for importing using the given
      | FileData Array provided. {{var}} as var is
      | referenced in the Array from keys.
      */
      public function ImportVariables($fileData) {
        $content = $this->Content;
        #//Seperating the array sections for document variables.
        $variableNames   = array_keys($fileData);
        $variableResults = array_values($fileData);
        #//Walking with the name array to prepend {{ and append }}.
        array_walk($variableNames, function(&$item){ $item = '{{'.$item.'}}'; });
        $content = str_replace($variableNames, $variableResults, $content);
        $this->Content = $content;
      }



      /*
      | @param None
      | Sift through the lines and find tripple triggers signalling a
      | call to the session area or student data retireval.
      | Usually used to get data when editing a student.
      | * COME BACK AND CLEAN UP!
      */
      public function SessionSifter() {
        // Loading the "Counts" module, a powerful but basic
        // line parsing Class.
        require_once "Counts.php";
        Counts::SetIndicator(['::', '!:', ':', '.']);
        $Content = $this->Content;
        $Lines   = explode("\n", $Content);
        $Lines   = array_map('trim', $Lines);
        // Looping each line of the "being-rendered" page to
        // see if there's a need for pulls from session to insert
        // data.
        foreach ($Lines as &$Line):
          if ($this->Contains(['{{{', '}}}'],$Line)) { #Line contains {{{...}}}
            // Getting what's in the {{{...}}} in the line.
            $Extract = []; preg_match('/{{{(.*)}}}/', $Line, $Extract);
            $Extract = $Extract[0];
            $Extract = str_replace(['{{{', '}}}'], ['', ''], $Extract);

            #extract=StudentID, going to place in the StudentID.
            if ($Extract == 'StudentID') {
              $Return = (isset($this->Cache['StudentID']))? $this->Cache['StudentID']: 'false';
              $Line = preg_replace('/{{{(.*)}}}/', $Return, $Line);
            }
            #extract[0] not set, no cached student or family - going to remove {{{...}}}.
            else if ( !isset($Extract[0]) || !isset($this->Cache['Student']) && !isset($this->Cache['Family']) ) {
              $Line = preg_replace('/{{{(.*)}}}/', '', $Line);
            }
            #else, so do manip on inner side of it.
            else {
              if (isset($this->Cache['Student']))     $Handler = $this->Cache['Student'];
              else if (isset($this->Cache['Family'])) $Handler = $this->Cache['Family'];

              ##search for :: has 1
              if (Counts::Count($Extract)['::'] == 1) {
                $Split = explode('::', $Extract);
                $Extract = $Split[0];
                $Eval    = $Split[1];
                  $Evals = explode('--', $Eval);
                // Needs to eval [1] if return of [0] is true.
                $Pieces = explode('.', $Extract);
                $Entry  = $Pieces[0];
                $Data = $Handler->Get($Entry, $this->ArrayFrom(1, $Pieces));
                if ($Data == $Evals[0]) {
                  $Line = preg_replace('/{{{(.*)}}}/', $Evals[1], $Line);
                } else $Line = preg_replace('/{{{(.*)}}}/', '', $Line);
              }
              ##search for !: has 1
              else if (Counts::Count($Extract)['!:'] == 1) {
                $Split = explode('!:', $Extract);
                $Extract = $Split[0];
                $Eval    = $Split[1];
                // Needs to eval [1] if return of [0] is true.
                $Pieces = explode('.', $Extract);
                $Entry  = $Pieces[0];
                $Data = $Handler->Get($Entry, $this->ArrayFrom(1, $Pieces));
                if ($Data == 'false') {
                  $Line = preg_replace('/{{{(.*)}}}/', $Eval, $Line);
                } else $Line = preg_replace('/{{{(.*)}}}/', '', $Line);
              }
              ##search for : has 1
              else if (Counts::Count($Extract)[':'] == 1) {
                $Split = explode(':', $Extract);
                $Extract = $Split[0];
                $Eval    = $Split[1];
                // Needs to eval [1] if return of [0] is true.
                $Pieces = explode('.', $Extract);
                $Entry  = $Pieces[0];
                $Data = $Handler->Get($Entry, $this->ArrayFrom(1, $Pieces));
                if ($Data == 'true') {
                  $Line = preg_replace('/{{{(.*)}}}/', $Eval, $Line);
                } else $Line = preg_replace('/{{{(.*)}}}/', '', $Line);
              }
              ##else, explode by . and serve handler data.
              else {
                $Pieces  = explode('.', $Extract);
                $Entry   = $Pieces[0]; //#
                // We have the Student object and can now use it to gather data.
                $Data = $Handler->Get($Entry, $this->ArrayFrom(1, $Pieces));
                $Line = preg_replace('/{{{(.*)}}}/', $Data, $Line);
              }
            }//end of session serve cause contains {{{}}}
          }//end of {{{}}} contains
        endforeach;
        $this->Content = implode("\n", $Lines);
      }

      /*SM:returns if the array strings are inside string true, else false.*/
      public function Contains($Lookfor, $In) {
        $Contains = true;
        foreach ($Lookfor as $index => $Lookingfor)
          if (strpos($In, $Lookingfor) === false)
          $Contains = false;
        return $Contains;
      }
      /*SM:returns rebuilt array from index given onwards*/
      public function ArrayFrom($index, $Array) {
        $c = [];
        foreach ($Array as $i => $Data):
          if ($i >= $index) array_push($c, $Data);
        endforeach;
        return $c;
      }
  }
