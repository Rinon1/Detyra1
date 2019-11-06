<?php
class Connection
{
	private $db_servername = "localhost";
	private $db_username = "root";
	private $db_password = "";
	private $db_name = "php_form";
    
    public $connection;
    function __construct() {
        $this->SetConnection();
      }

	function SetConnection()
	{
		$this->connection = new mysqli($this->db_servername, $this->db_username, $this->db_password);
		if ($this->connection->connect_error) {

			die("Connection failed: {$this->connection->connect_error}");
		}

		$db = $this->create_db();
		if ($db === true) {
            $this->connection->select_db($this->db_name);
			$tables = $this->create_table();
		}

	}

	function getConnection()
	{
		return $this->connection;
	}

	function create_db()
	{
		$create_db = "CREATE DATABASE IF NOT EXISTS " . $this->db_name;

		if ($this->connection->query($create_db) === TRUE)
			return true;
		return false;
	}

	function create_table()
	{
		$query = "CREATE TABLE IF NOT EXISTS messages(
		    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		    firstname varchar(100) NOT NULL,
		    lastname varchar(100) NOT NULL,
		    email varchar(50) NOT NULL,
		    num int NOT NULL,
		    message text,
		    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
	    ";

		if ($this->connection->query($query) == true)
			return true;
		return false;
	}
}