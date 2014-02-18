<?php
// start session


/**
 * Database connection credentials
 */	
    $host = 'localhost';
	$database = 'devtest';
	$user = 'test';
	$pass = 'test';
	
	
/**
 * Define app constants
 */	
	define('SESSION_INCREMENT', 10); // in seconds
	define('MAX_MONTHLY_ACTIVITY', 60 * 60); // max minutes counted towward rebate in a given month (converted to seconds)
	define('REBATE_PROBATION_TERM', 3); // in months
	define('REBATE_MINIMUM', 180); // rebate minimum (converted to seconds) 
	
	// define rebate messages
	define('CRITERIA_1', 'You must be active for at least '.REBATE_MINIMUM.' minutes.');
	define('CRITERIA_2', 'You must be in program for at least '.REBATE_PROBATION_TERM.' months');
	define('REFUND_SUMMARY', 'You have met refund criteria. Your time applied toward rebate is: ');
	
	
/**
 * crate db object
 */	
try {
    $db = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
	
?>