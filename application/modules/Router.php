<?php
  class Router {
    /*
    | Static class built to parse the SLUG-based URL and
    | return segments of it which are dictated.
    */

    // ******************************************************

      static protected $url;
      static protected $segments;

    // ******************************************************

      /*
      | @param None
      | Starts the static App.
      */
      public static function Initialize() {
        self::$url = $_SERVER['REQUEST_URI'];
        self::$segments = explode('/', self::$url);
      }

      /*
      | @param Int:SegmentOfUrl
      | Uses integer to reference the internal URL variable
      | and retrieve the part of the URL(URI) that relates to
      | it split by /.
      */
      protected static function URLParser($segment) {
        return self::$segments[$segment];
      }

      /*
      | @param None
      | Shorthand methods for getting URL segments and main
      | -taining them.
      */
      public static function First() {
        return self::URLParser(1);
      }
      public static function Second() {
        return self::URLParser(2);
      }
      public static function Third() {
        return self::URLParser(3);
      }
      public static function Fourth() {
        return self::URLParser(4);
      }
      public static function Segment($segment) {
        return self::URLParser($segment);
      }
  }
