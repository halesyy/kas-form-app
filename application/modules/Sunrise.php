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

        // ob_start();
        require "$dir";
        // return ob_get_contents();
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
