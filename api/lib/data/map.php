<?php
class MatrixDBInterface {

	static function MapCapability($cno, $vno){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call MapCapability(".$cno.",".$vno.")"))
		{
			return "Insert failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}
	
	static function MapFeature($fno, $cno, $vno){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call MapFeature(".$fno.",".$cno.",".$vno.")"))
		{
			return "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}
	static function RemoveMapCapability($mno){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call RemoveCapMap(".$mno.")"))
		{
			return "Insert failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}

	static function RemoveMapFeature($fno, $cno, $vno){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call RemoveFeatureMap(".$fno.",".$cno.",".$vno.")"))
		{
			return "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}	
}
?>