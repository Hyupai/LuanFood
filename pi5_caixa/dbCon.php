<?php

$servername = "193.203.175.82";
$dbname = "u711202052_samuel_db2";
$serverport = 3306;
$username = "u711202052_samuel2";
$password = "__XDinossauro21X__";

$dsn = "mysql:host=$servername;port=$serverport;dbname=$dbname;";
$connection = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
