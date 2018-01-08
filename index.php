<?php
include_once 'ActiveRecord.php';
include_once 'Cliente.php';
include_once 'Connection.php';

Cliente::setConnection(Connection::getInstance('./configdb.ini'));

echo "<pre>";
var_dump(Cliente::listarRecentes(5));
echo "</pre>";

echo Cliente::numTotal();
