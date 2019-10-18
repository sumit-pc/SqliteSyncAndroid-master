<?php

class DB_Functions {

    private $db;
    // connecting to mysql

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($Id,$User) {
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        // Insert user into database
        $result = mysqli_query($con, "INSERT INTO users VALUES($Id,'$User')");
        if ($result) {
			return true;
        } else {
			if( mysqli_errno($con) == 1062) {
				// Duplicate key - Primary Key Violation
				return true;
			} else {
				// For other errors
				return false;
			}            
        }
    }
	 /**
     * Getting all users
     */
    public function getAllUsers() {
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        $result = mysqli_query($con, "select * FROM users");
        return $result;
    }
}

?>