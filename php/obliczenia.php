<?php

function obliczenia()
{
	$res = array('a' => Null, 'b' => Null, 'c' => Null, 's' => Null, 'e' => Null);

	if(!(isset($_POST['sum']) || isset($_POST['diff'])))
	{
		return $res;
	}

	$a=@(float)$_POST['a'];
	$b=@(float)$_POST['b'];

	if(isset($_POST['sum' ])) {$c=$a+$b; $s='sum';} 
	if(isset($_POST['sum' ])&&($a=='1')&&($b=='1')) {$c='miłość'; $s='sum';} 
	if(isset($_POST['diff'])) {$c=$a-$b; $s='diff';}

	$res['a']=$a;
	$res['b']=$b;
	$res['c']=$c;
	$res['s']=$s;

	return $res;
}
