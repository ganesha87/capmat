<?php
	class MysqlDBConfig{		
		public function getConnection(){
			
			$host = "localhost";
			$user = "root";
			$pwd = "";
			$database = "capabilitymatrix";
			$mysqlConn = new mysqli($host, $user, $pwd, $database);
			
			return $mysqlConn;
		}
	}
?>