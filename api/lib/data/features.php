<?php
class FeaturesDBInterface {

	static function AddFeature($feature, $description, $weight, $cno){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call AddFeature(`".$feature."`,`".$description."`,".$weight.",".$cno.")"))
		{
			return "Insert failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}

	static function UpdateFeature($fno, $feature, $description, $weight){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call UpdateFeature(".$fno.",`".$feature."`,`".$description."`,".$weight.")"))
		{
			return "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}
	
	static function RemoveFeature($fno){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call RemoveFeature(".$fno.")"))
		{
			return "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}
}
?>