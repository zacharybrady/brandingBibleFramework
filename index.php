<?php
ini_set('display_errors', 1); //Allow error mesages

/*Load the SplClassLoader and Register Michelf namespace*/
require_once('libraries/Doctrine/SplClassLoader.php');
$loadMichelf = new SplClassLoader('Michelf', 'libraries/');
$loadMichelf->register();

use \Michelf\MarkdownExtra;

/*PROOF OF CONCEPT*/
/*
$practiceText = "##Pratice Header##";
$finalText = MarkdownExtra::defaultTransform($practiceText);
print_r($finalText);
*/



?>