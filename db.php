<?php


define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "Osmanosman1.");


define("DB_NAME", "dbveiligprog");

class DB{
	protected $dbh;
	protected $stmt;
    protected $resultSet;

	public function __construct(){
		$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->resultSet = [];
	}

	public function executeSQL($query){
        $this->stmt = $this->dbh->prepare($query);
		$result = $this->stmt->execute();

		if (!$result) {
    		die('<pre>Oops, Error execute query '. $query .'</pre><br><pre>'.'Result code: '. $result .'</pre>');
   		}	
		
		$row = $this->stmt->fetchAll();
		
		if(!empty($row)){
			$this->resultSet = $row;
			return $this->resultSet;
		}

		return $this->resultSet;
	}
}

?>