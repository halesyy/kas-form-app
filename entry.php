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

                              _oo0oo_
                             o8888888o
                             88" . "88
                             (| -_- |)
                             0\  =  /0
                           ___/`---'\___
                         .' \\|     |// '.
                        / \\|||  :  |||// \
                       / _||||| -:- |||||- \
                      |   | \\\  -  /// |   |
                      | \_|  ''\---/''  |_/ |
                      \  .-\__  '-'  ___/-. /
                    ___'. .'  /--.--\  `. .'___
                 ."" '<  `.___\_<|>_/___.' >' "".
                | | :  `- \`.;`\ _ /`;.`/ - ` : | |
                \  \ `_.   \_ __\ /__ _/   .-` /  /
            =====`-.____`.___ \_____/___.-`___.-'=====
                              `=---='
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                      佛祖保佑         永无BUG
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
             Papa bless your code, let it be bug-free.
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  */


  //************************************************************************************


  /*
  | @NOTE: Quick run through the application.
  | Our application is  going to be segmented into two "big" sections  instead
  | of 3 minor areas (Model View Controller), we're having the RESTful API and
  | an elegant system for creating initializing code.
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
