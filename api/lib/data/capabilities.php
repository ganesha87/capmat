<?php
	

	class CapabilityDBInterface {
		
		static function AddCapability($capability, $notes, $parent){
			$mySqlConn = MysqlDBConfig::getConnection();
			if(!$mySqlConn->query("call AddCapability(`".$capability."`,`".$notes."`,".$parent.")"))
			{
				return "Insert failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
			}			
		}		
		
		static function UpdateCapability($cno, $capability, $notes, $parent, $active){
			$mySqlConn = MysqlDBConfig::getConnection();
			if(!$mySqlConn->query("call UpdateCapability(".$cno.",`".$capability."`,`".$notes."`,".$parent.",".$active.")"))
			{
				return "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
			}
		}
		
		static function  ListCapabilities(){
			$mySqlConn = MysqlDBConfig::getConnection(); 
			if(!($result = $mySqlConn->query("call GetCapabilities()")))
			{
				return "Fetch failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
			}
			else
			{
				return $result;
			}
		}
	}
?>