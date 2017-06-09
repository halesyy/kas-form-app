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
      | @param String:ServeFileName, Array:Data
      | 1. Will use the internal class method to
      |    safely retrieve data.
      | 2. Using another internal method to implement
      |    user data into document.
      */
      public function Render($fileName, $fileData = []) {
        $dir = $this->ServeDirectory;
        $dir .= $fileName.'.php';
        $this->RetrieveFileContent($dir);
        $this->ImportVariables($fileData);

        echo $this->Content;
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
