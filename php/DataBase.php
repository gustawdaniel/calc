<?php

require_once __DIR__."/Log.php";
require_once __DIR__."/../vendor/mustangostang/spyc/Spyc.php";

class DataBase
{
	function save(Log $log){

		$a = $log->getA();
		$b = $log->getB();
		$s = $log->getAction();
		$u = $log->getAgent();
		
		// config from yml
		$config = Spyc::YAMLLoad(__DIR__."/../config/parameters.yml")["config"];
		
		// connecting
		$mysqli = @new mysqli($config["host"], $config["user"], $config["pass"], $config["base"], $config["port"]);

		// test of connecting
		if ($mysqli -> connect_errno)
		{
			$code = $mysqli -> connect_errno;
			$mess = $mysqli -> connect_error;
			die("Failed to connect to MySQL: ($code) $mess\n");
		}

		// definition of query
		$query  = 'INSERT INTO log VALUES(NULL,NOW(),?,?,?,?);';

		// preparing
		$stmt = @$mysqli -> prepare($query);

		// test of preparing
		if(!$stmt)
		{
			$code = $mysqli -> errno;
			$mess = $mysqli -> error;
			$mysqli -> close();
			die("Failed to prepare statement: ($code) $mess\n");
		}

		// binding
		$bind = @$stmt -> bind_param("ddss", $a, $b, $s, $u);

		// test of binding
		if(!$bind)
		{
			$stmt   -> close();
			$mysqli -> close();
			die("Failed to bind param.\n");
		}
		
		// executing query
		$exec = @$stmt -> execute();

		// checking fails
		if(!$exec)
		{
			$stmt   -> close();
			$mysqli -> close();
			die("Failed to execute prepare statement.\n");
		}

		// clearing and disconnecting
		$stmt   -> close();
		$mysqli -> close();
	}	
}


