<?php

class dbManager{
	private $user = 'magazzino';
	private $pass = 'magazzino';
	private $db_name = 'magazzino';
	private $host = 'localhost';
	private $connection = NULL;

	function __construct() {
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
	}

	function __destruct() { 
            $this->connection->close();
	}

        

}


?>