<?php
// start a session (used to keep user's info)
session_start();

/**
 * Three actions are possible:
 * 1) Login page
 * 2) Login attempt
 * 3) Activity action
 */

// include Bootstrap
require 'config/Bootstrap.php';

// include User object
require 'model/User.php';
$user = new User($db);

// if user is not active and this is not a login attempt show login page
if (!isset($_SESSION['id']) && !isset($_POST['loginAttempt'])) {
	include 'view/login.html'; 
	exit;
}

// process login attempt
if (isset($_POST['loginAttempt']) && isset($_POST['email']) && isset($_POST['pass'])) { 
	if(!$user->login($_POST['email'], $_POST['pass'])) {
		include 'view/login.html';
		exit;		
	}
}

// process activity action
if (isset($_POST['activity'])) {
	switch ($_POST['activity']) {
		case 'Rebate Status':
			switch($user->rebateStatus()) {
				case 1:
					echo CRITERIA_1;
					break;
				case 2:
					echo CRITERIA_2;
					break;
				default:
					echo REFUND_SUMMARY . $user->rebateStatus();
					break;
			}
			break;
		
		// for all other actions just check user's Active status
		default:
			$user->isActive();
			break;
	} 
}

// show logged-in  page
include 'view/default.html';

?>