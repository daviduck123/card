<?php
// auto-generated by sfDatabaseConfigHandler
// date: 2014/06/19 13:35:16

$database = new sfPropelDatabase();
$database->initialize(array (
  'dsn' => 'mysql://root@localhost/card',
), 'propel');
$this->databases['propel'] = $database;
