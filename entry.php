<?php
  ob_start();
  session_start();
  /*
     ::::==========:::::::::::::::::::::::::::::::::::::::::::::::::::::::
     :::::::=========::::::.---------------.:::::::::::::::::::::::::::::::
     :::=============::::::| .------------. |:::::::::::::::::::::::::::::
     ::::==========::::::::| | === == ==  | |:::::::::::::::::::::::::::::::::
     ::::==========::::::::| | Kontroller | |:::::::::::::::::::::::::::::::
     :::::::=========='::::| |  Joint!    | |:::::::::::::::::::::::::::::
     :::===========::::::::| |____________| |::::::((;):::::::::::::::::::::
     """"============""""""|___________oo___|"")"""";(""""""""""""""""""""""
       ==========='           ___)___(___,o   (   .---._
          ===========        |___________| 8   \  |COF|_)    .+-------+.
       ===========                     o8o8     ) |___|    .' |_______| `.
         =============      __________8___     (          /  /         \  \
      |\`==========='/|   .'= --------- --`.    `.       |\ /           \ /|
      | "-----------" |  / ooooooooooooo  oo\    _\_     | "-------------" |
      |______I_N______| /  oooooooooooo[] ooo\   |=|     |_______JEK_______|
                       / O O =========  O OO  \  "-"   .-------,
                       `""""""""""""""""""""""'      /~~~~~~~/
     _______________________________________________/_   ~~~/_______________
     ............................................. \/_____/..desk at 17:30..
  */

  //************************************************************************************

    /*
    | note to the person that gets to maintain my artwork:
    | this write of the application does not feature what I intended,
    | if I was able to, I'd write a global module that would take care of the
    | input sanitization, which could then be stored as a cache to be used
    | in the output sanitization.
    | meaning: if you record all of the inputs through a FLOW class, you are
    | able to sanitize the input data using that, with types, and declarations.
    | I made the mistake with the last coding system that I used that system,
    | but I was declaring the data types a lot.
    | the module idea i'd pose is something that lets you append to it, and you
    | would then have more customization to the Students form, that's just
    | one example.
    */

  //************************************************************************************

  /*
  | @NOTE: Quick run through the application.
  | Our application is  going to be segmented into two "big" sections  instead
  | of 3 minor areas (Model View Controller), we're having the RESTful API and
  | an elegant system for creating initializing code.
  */

  /*
  | THIS ENTIRE PROJECT WAS CODED THANKS TO THE FOLLOWING MUSIC SUPPLYING
  | THE CODER JACK HALES WITH ENERGY:
  | - Angel of Death, Slayer
  | - Rich & Sad, Post Malone
  | - Battery, Metallica
  | - Money, Pink Floyd
  | - Spit Out The Bone, Metallica
  | - Trapped Under Ice, Metallica
  | - Highway Star, Deep Purple
  | - Holy Wars... The Punishment Due, Megadeth
  */


  //************************************************************************************


  /*
  | ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  */

    require_once "application/Initialize.php";

  /*
  | ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  */

  //***********************************************************************************

  ob_flush();
