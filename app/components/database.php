<?php

	function getDb() {
		$db = pg_connect("host=localhost port=5432 dbname=getpostdemo user=getpostuser password=getpostpass");
		return $db;
	}

?>