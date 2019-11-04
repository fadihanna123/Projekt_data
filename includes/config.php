<?php
	// Rapportera alla fel och visa dem.
	error_reporting(-1);
	ini_set("display_errors", 1);
	// Importera klassen datasource.
	spl_autoload_register(function($class) {
	    include 'classes/' . $class . '.class.php';
	});

	
?>