<?php

function save($res){

	// Dane potrzebne do polaczenia.
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$base = 'calc';
	$port = '3306';
	
	// Laczenie z baza danych.
	$mysqli = @new mysqli($host, $user, $pass, $base, $port);
	
	// Testowanie czy laczenie sie powiodlo.
	if ($mysqli -> connect_errno)
	{
		$code = $mysqli -> connect_errno;
		$mess = $mysqli -> connect_error;
		die("Failed to connect to MySQL: ($code) $mess\n");
	}

	// Zapytanie do bazy danych.
	$query  = 'INSERT INTO calc_1 VALUES(NULL,NOW(),?,?,?,?);';

	// Przygotowywanie prepared statement
	$stmt = @$mysqli -> prepare($query);

	// Testowanie czy udalo sie przygotowac zapytanie.
	if(!$stmt)
	{
		$code = $mysqli -> errno;
		$mess = $mysqli -> error;
		$mysqli -> close();
		die("Failed to prepare statement: ($code) $mess\n");
	}

	// Przygotowywanie parametrow zapytania.
	$bind = @$stmt -> bind_param("ddss", $a, $b, $s, $u);

	// Testowanie czy udalo sie podpiac parametr.
	if(!$bind)
	{
		$stmt   -> close();
		$mysqli -> close();
		die("Failed to bind param.\n");
	}

	$a = $res['a'];
	$b = $res['b'];
	$s = $res['s'];
	$u = $_SERVER['HTTP_USER_AGENT'];

	// Wykonywanie zapytania.
	$exec = @$stmt -> execute();
	
	// Sprawdzanie czy zaytanie przebieglo pomyslnie.
	if(!$exec)
	{
		$stmt   -> close();
		$mysqli -> close();
		die("Failed to execute prepare statement.\n");
	}

	// Czyszczenie wynikow wyszukiwania i
	// rozlaczanie sie z baza danych.
	$stmt   -> close();
	$mysqli -> close();
}


/*
// Przygotowywanie do pobierania wynikow.
// Musi byc tylesamo parametrow co kolumn wynikowych.
$bind = @$stmt -> bind_result($lang_id);

// Testowanie czy udalo sie podpiac wyniki.
if(!$bind)
{
	$stmt   -> close();
	$mysqli -> close();
	die("Failed to bind result.\n");
}

// Pobieranie wynikow.
while($stmt->fetch())
{
	echo "$lang_id\n";
}
*/


