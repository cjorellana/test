<?php

date_default_timezone_set('America/Guatemala');


$db = new PDO('sqlite:test.db');
$sql =<<<EOF
SELECT id,notificado from notificartb LIMIT 1;
EOF;

$ret = $db->query($sql);
foreach($ret as $row){
    echo "ID = ". $row['id'] . "\n";
    echo "notificado = ". $row['notificado'] ."\n";    
}
