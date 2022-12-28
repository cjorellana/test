<?php

date_default_timezone_set('America/Guatemala');


$db = new PDO('sqlite:test.db');
$sql =<<<EOF
delete from notificartb where id in(2,3);
EOF;

$db->query($sql);