<?php
/**
 * @name User
 *
 * @desc User object and requisites methods
 * @author  Dusan Kuzmanovic
 * @version 1.0
 */
 
/** @see AbstractUser */ 
require 'AbstractUser.php';

class User extends AbstractUser {
	
	/**
	 * User Login method
	 *
	 * @return bool 
	 */
	public function login($email, $pass) {
		
		// Check if creds match any uses in database
		$query = $this->db->prepare('
			SELECT * 
			FROM users 
			WHERE email = ? AND password = ? 
		');
		$query->execute(array($email, $pass));
		
		// if there is a user with matching creds start his session
		if ($query->rowCount() > 0) {
			// add user's info to session variable
			$this->info = $query->fetch(PDO::FETCH_OBJ);
			
			// add entry into user_sessions table
			$session = $this->db->prepare("
				INSERT INTO user_sessions (user_id, session_start, session_time) 
				VALUES (?, NOW(), 0);				
			");
			$session->execute(array($this->info->user_id));
			
			// set session id
			$_SESSION['id'] = $this->db->lastInsertId();
			// set user id
			$_SESSION['uid'] = $this->info->user_id;
			// set session start and last activity timestamp 
			$_SESSION['start'] = $_SESSION['lastActivity'] = time();	
					
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
	
	/**
	 * User Logout method
	 *
	 * @return void
	 */
	public function logout() {
		session_destroy();
	}	
	
	/**
	 * Method to check if user is active
	 *
	 * @return bool
	 */
	public function isActive() { 
		// first check is user is logged in
		if(!isset($_SESSION['id'])) {
			$this->logout();
			return FALSE;
		}
		 
		// test to see last activity is under defined value
		if ((time() - $_SESSION['lastActivity']) <= SESSION_INCREMENT) {
			// update activity timestamp
			$_SESSION['lastActivity']  = time();
			return TRUE;
		} else {
			// update user's session with total activity time
			$activeTime = $_SESSION['lastActivity'] - $_SESSION['start'];
			$query = $this->db->prepare("
				UPDATE user_sessions 
				SET session_time = ?
				WHERE session_id = ?
			");
			$query->execute(array($activeTime, $_SESSION['id']));
			// log user out
			$this->logout();
		}
		
		// return default 
		return FALSE;
	}
	
	/**
	 * Metod to determine if user is eligible for rebate 
	 * returns integer code where 1 and 2 are creteria not met codes
	 * while anything other then 1 and 2 would be sum of eligible activity time
	 *
	 * @return integer 
	 */
	public function rebateStatus() {
		// set sum integer variable to zero
		$sum = 0;
		
		// Get total active time per month. Calculate applicable time based on monthly limits directly in DB
		$query = $this->db->prepare("
			SELECT MONTH(session_start) as month, IF(SUM(session_time) > ?, ?, SUM(session_time)) AS monthTotal 
			FROM user_sessions
			WHERE user_id = ?
			GROUP BY YEAR(session_start), MONTH(session_start)
		");
		$query->execute(array(MAX_MONTHLY_ACTIVITY, MAX_MONTHLY_ACTIVITY, $_SESSION['uid']));
		
		// check to see if user has minimum monthly tenure
		if ($query->rowCount() < REBATE_PROBATION_TERM) {
			return 1;
		}
		
		// sum up the monthly totals
		while($row = $query->fetch(PDO::FETCH_OBJ)) {
			$sum += $row->monthTotal;
		}
		
		// check if agregate activity time meets rebate minimum (converted to seconds)
		if ($sum < (REBATE_MINIMUM * 60)) {
			return 2;
		} 
		
		// return default
		return $sum;
	}
		
/**
 * @todo CRUD methods
 */
		
} // END


?>