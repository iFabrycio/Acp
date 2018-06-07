<?php

/**
 * Error reporting
 */

ini_set("display_errors", 1);
error_reporting(E_ALL);

/**
 * Global config array
 */
$aGlobalConfig = array
(
	"mysql" => array
	(
		"host" => "flyegay",
		"port" => 3306,
		"user" => "flyegay",
		"pass" => "flyegay",
		"name" => "flyegay"
	)
);

$ipservidor = '144.217.61.146';
$portaservidor = '7777';
$rconservidor = 'flyegay';

$cargo_dev = '11';
$cargo_geral = '10';
$cargo_adm = '9';
$cargo_mod = '8';
$cargo_ajd = '7';
$cargo_coronel = '6';
$cargo_crg = '5';
$cargo_cmd = '4';
$cargo_geradio = '3';
return $aGlobalConfig;
?>
