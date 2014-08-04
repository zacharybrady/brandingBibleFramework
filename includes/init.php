<?php
	/*Include Classes and generate arrays and function*/
	
	require_once("config.php"); //Configuration file
	

	/*Load the SplClassLoader and Register Michelf namespace*/
	require_once('libraries/Doctrine/SplClassLoader.php');

	//Markdown Class
	$loadMichelf = new SplClassLoader('Michelf', 'libraries/');
	$loadMichelf->register();

	//Branding Bible Class
	$loadSiren = new SplClassLoader('Siren', 'libraries/');
	$loadSiren->register();

	use \Siren\BrandBible;

	//use \Michelf\MarkdownExtra;

?>