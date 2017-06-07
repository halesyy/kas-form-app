<?php
  class App {
      /*
      | First loaded OOP Component, handles session
      | over the entire app and is used as a static
      | accessor & reporter.
      | @NOTE not specific param inputs, etc since
      | this is a small class for the app, not important.
      */

    //*******************************************************

      protected static $console_messages = [];

    //*******************************************************


      /*initializes the app and returns app status, bool.
      any "app failed" requirements go in this function*/
      public static function Initialize() {
        self::Console('Loaded app');

          /*INITIALIZING OTHER STATIC CLASSES*/
          Router::Initialize();

        return true;
      }

      /*add a string message to console to report later on.
      also shorthand for printing if no param 0 given.*/
      public static function Console($message = false) {
        if (!$message) self::PrintConsole();
        else array_push(self::$console_messages, $message);
      }

      /*prints entirety of console array to optstream.*/
      public static function PrintConsole() {
        self::Display(self::$console_messages);
      }

      /*displays an array using preformmatted tags.*/
      public static function Display($array) {
        echo "<pre>", print_r($array) ,"</pre>";
      }

  }
