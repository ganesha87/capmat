<?php
class VendorsDBInterface {

	static function AddVendor($vendor, $notes, $url){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call AddVendor(`".$vendor."`,`".$notes."`,`".$url."`)"))
		{
			return "Insert failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}

	static function UpdateVendor($vno, $vendor, $notes, $url, $active){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!$mySqlConn->query("call UpdateVendor(`".$vendor."`,`".$notes."`,`".$url."`,`".$active."`,".$vno.")"))
		{
			return "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
	}

	static function  ListVendors(){
		$mySqlConn = MysqlDBConfig::getConnection();
		if(!($result = $mySqlConn->query("call GetVendors()")))
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