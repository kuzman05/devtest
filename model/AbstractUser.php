<?php
/**
 * @name AbstractUser
 *
 * @desc Abstract class to blueprint User
 * @author  Dusan Kuzmanovic
 * @version 1.0
 */

abstract class AbstractUser {
	
	/**
	 * email
	 * @var string
	 */
	protected $email;
	
	/**
	 * pass
	 *
	 * @var string
	 */
	protected $pass;
	
	/**
	 * Object to hold user's info
	 *
	 * @var stdClass
	 */
	protected $info;	
	
	protected $db;
		
	
	/**
	 * Constructor method for User 
	 * 
     * @return void
	 */
	public function __construct($db) {
		$this->db =& $db;
	}
	
	/**
	 * User Login method
	 *
	 * @return void 
	 */
	public function login($email, $pass) {
		// login logic
	}
	
	/**
	 * User Logout method
	 *
	 * @return void
	 */
	public function logout() {
		// logut logic
	}	
	
	/**
	 * Method to check if user is active
	 *
	 * @return bool
	 */
	public function isActive() {
		// Logic to determine if User is active or not
	}
	
	/**
	 * Metod to determine if user is eligible for rebate 
	 *
	 * @return bool
	 */
	public function rebateStatus() {
		// rebate logic
	}
		
} // END


?>