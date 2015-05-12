<?php
/*require_once("config.php");*/
		class Database  {
			private $connection;
				function __construct() {
					$this->open_connection();
				}
				// function that opens a open connection 
				public function open_connection(){
					$this->connection = mysql_connect('localhost','root','leverage');
					if(!$this->connection){
						die("Database connection failed" . mysql_error());
					} else
					 $db_select = mysql_select_db('latante',$this->connection);
					 if(!$db_select){
						die("Database Selection failed " . mysql_error());
					 }
				}
				// function that close a database connection
				public function close_connection(){
					if(isset($this->connection)){
						mysql_close($this->connection);
						unset($this->connection);
					}
				}
				
				public function execute($sql){
					
					$result = mysql_query($sql,$this->connection);
					if(!$result){
						die("Sql Query failed " . mysql_error());
					}
					return $result;
				}
			
				public function fetch_record($result_set){
					return mysql_fetch_array($result_set);
				}
				public function numberOfRows($value){

					return mysql_num_rows($value);
				}
}
		$database = new Database();
?>