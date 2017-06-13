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

    // *******************************************



      /*
      | @param String:ServeFileName, Array:Data, String:PrependToString
      | 1. Will use the internal class method to
      |    safely retrieve data.
      | 2. Using another internal method to implement
      |    user data into document.
      */
      public function Render($fileName, $fileData = [], $prepend = false) {
        $dir = $this->ServeDirectory;
        #//prepend is used if the require for example API isn't in the entry.php
        #//file, and anchor is different.
        if ($prepend !== false) $dir = $prepend.'/'.$dir;
        $dir .= $fileName.'.php';
        $this->RetrieveFileContent($dir);
        $this->ImportVariables($fileData);
        $this->SortTriggers();

        echo $this->Content;
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
        'whole' => 'col-lg-12 col-md-12 col-sm-12 col-xs-12',
        'half' => 'col-lg-6 col-md-6 col-sm-6 col-xs-12',
        'third' => 'col-lg-4 col-md-4 col-sm-4 col-xs-12',
        'fourth' => 'col-lg-3 col-md-3 col-sm-6 col-xs-12'
      ];
      public function SortTriggers() {
        $content  = $this->Content;
        $lines = explode("\n", $content);
        foreach ($lines as $index => $line) {
          if (isset(trim($line)[0]) && trim($line)[0] == '@') {
            $trigger = ltrim(explode(' ', trim($line))[0], '@'); //@trim => trim.
              if (isset($this->TriggerConversions[$trigger])) $colstr = $this->TriggerConversions[$trigger];
              else { echo 'Trigger conversion not found.'; return false; }
            $params = preg_replace('/[@].* {(.*)}/', '$1', trim($line));
            $params = array_map('trim', explode(',', $params));

            $c = ["<div class='{$colstr}'>", "<input ".implode(' ', $params)." />", "</div>"];
            $lines[$index] = implode("\n", $c);

            // unset($lines[$index]); //remove line from constructor.
          }
        }
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
          $content = file_get_contents($fileName);
          $this->Content = $content;
          return $content;
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
  }
