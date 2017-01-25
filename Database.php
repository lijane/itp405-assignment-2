<?php

class Database {
	private $host = 'itp460.usc.edu';
	private $database_name = 'dvd';
	private $username = 'student';
	private $password = 'ttrojan';
	//Protected gives any child or sub-classes access, basically a mix of private and public
	protected static $pdo; //static property or class property (properties that persist across all Artists?)

	public function __construct(){
	//If there is no $pdo already, create one and store in static property
		if (!self::$pdo){
		// echo 'Database connection created';

		//Connect to database using pdo SQL
	    $connection_string = "mysql:host=$this->host;dbname=$this->database_name";
	    self::$pdo = new PDO($connection_string, $this->username, $this->password);
	  }
	}

}