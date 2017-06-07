<?php
  class App {
    /*
    | First loaded OOP Component, handles session
    | over the entire app and is used as a static
    | accessor & reporter.
    */

    //*******************************************************

      protected static $console_messages = [];

    //*******************************************************

      public static function Initialize() {
        self::Console('Loaded app');
        return true;
      }

      public static function Console($message = false) {
        if (!$message) self::PrintConsole();
        else array_push(self::$console_messages, $message);
      }

      public static function PrintConsole() {
        self::Display(self::$console_messages);
      }

      public static function Display($array) {
        echo "<pre>", print_r($array) ,"</pre>";
      }

  }
