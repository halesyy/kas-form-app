<?php
  session_start();

  $Store = 'a:1:{i:0;s:2215:"O:7:"Student":8:{s:8:"Personal";a:17:{s:5:"fname";s:4:"Jack";s:5:"lname";s:5:"Hales";s:5:"mname";s:7:"Geoffry";s:5:"pname";s:0:"";s:11:"yearToEnrol";s:4:"2018";s:9:"yearLevel";s:2:"11";s:6:"gender";s:4:"male";s:11:"dateOfBirth";s:10:"2001-05-15";s:11:"nationality";s:10:"Australian";s:9:"isStudent";a:2:{s:10:"aboriginal";s:5:"false";s:14:"torresStraitIs";s:5:"false";}s:14:"languageAtHome";s:10:"Australian";s:7:"address";s:10:"7 Ferry St";s:4:"town";s:7:"Kempsey";s:5:"state";s:15:"New South Wales";s:8:"postCode";s:4:"2440";s:9:"livesWith";s:3:"Mom";s:8:"religion";s:12:"Presbyterian";}s:9:"Education";a:5:{s:15:"hasBeenExpelled";s:5:"false";s:16:"hasBeenSuspended";s:4:"true";s:14:"hasBeenRefused";s:5:"false";s:7:"details";s:6:"... :D";s:14:"previousSchool";s:26:"East Kempsey Public School";}s:9:"Behaviour";a:5:{s:19:"hasDisciplineIssues";s:5:"false";s:15:"hasBeenArrested";s:5:"false";s:20:"usedAlcoholOrTobacco";s:5:"false";s:16:"usedIllegalDrugs";s:5:"false";s:7:"explain";s:0:"";}s:7:"Medical";a:3:{s:16:"DoctorHealthFund";a:4:{s:7:"private";a:3:{s:9:"ambulance";s:4:"true";s:10:"healthFund";s:4:"true";s:18:"companyAndMemberId";s:0:"";}s:14:"medicareNumber";s:11:"24186893351";s:18:"medicareExpiryDate";s:7:"09/2017";s:22:"medicarePositionOnCard";s:1:"1";}s:18:"MedicalInformation";a:4:{s:10:"doctorName";s:5:"Ruben";s:11:"doctorPhone";s:1:"#";s:11:"isImmunised";s:4:"true";s:5:"wears";a:2:{s:7:"glasses";s:4:"true";s:8:"contacts";s:5:"false";}}s:17:"MedicalConditions";a:2:{s:3:"has";a:7:{s:6:"asthma";s:4:"true";s:4:"adhd";s:5:"false";s:8:"diabetes";s:5:"false";s:9:"epilepsey";s:5:"false";s:6:"autism";s:5:"false";s:9:"allergies";s:5:"false";s:7:"explain";s:28:"Has supporting documentation";}s:17:"earlyIntervention";s:4:"true";}}s:9:"Emergency";a:2:{i:0;a:3:{s:4:"name";s:18:"Christian Aquilina";s:5:"phone";s:10:"0430525909";s:12:"relationship";s:5:"Uncle";}i:1;a:3:{s:4:"name";s:12:"Randal Jones";s:5:"phone";s:10:"0430525909";s:12:"relationship";s:6:"Mother";}}s:9:"HasFamily";b:0;s:8:"FamilyID";b:0;s:4:"Fees";a:1:{s:16:"enrolment-prices";a:13:{i:0;i:1725;i:1;i:1725;i:2;i:1725;i:3;i:1725;i:4;i:1725;i:5;i:1725;i:6;i:1725;i:7;i:2045;i:8;i:2045;i:9;i:2415;i:10;i:2415;i:11;i:2750;i:12;i:2750;}}}";}';

  // echo "<pre>", print_r(unserialize($Store)) ,"</pre>";
  $StudentStore = unserialize($Store);
  $_SESSION = [
    'form' => [
      'students' => $StudentStore,
      'families' => []
    ]
  ];
  echo "<pre>", print_r($_SESSION) ,"</pre>";
