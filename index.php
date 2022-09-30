<?php
require 'classes/database.php';

$database = new Database;

$database->query('SELECT * FROM table_name');
$rows = $database->resultset();
print_r($rows);
