<?php

date_default_timezone_set('America/Guatemala');

## create database
$db = new SQLite3('test.db');

##create table 
$db->exec("CREATE TABLE notificartb(id INTEGER PRIMARY KEY, notificado INT)");

## insert unico registro

$db->exec("INSERT INTO notificartb(notificado) VALUES(0)");