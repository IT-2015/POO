<?php
require_once '../../autoload.php';

$db = Cared_DB_Connection::getInstance("mysql:hostname=127.0.0.1;dbname=portfolio", "root", "0000");

$query = new Cared_DB_Select($db);


