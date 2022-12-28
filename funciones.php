<?php

class funciones
{
    public $db;

    function __construct() {
        //$this->db = new SQLite3('test.db');
        $this->db = new PDO('sqlite:/home/cjorellana/test/test.db');
    }

    public function verificar()
    {
        
        $sql =<<<EOF
            SELECT notificado from notificartb  LIMIT 1;
        EOF;

        $res =  $this->db->query($sql);
        $int_value =0;

        foreach($res as $row){
            $int_value = intval($row['notificado']);             
        }

        if($int_value==0)
        {
	    echo "envia mail";
            //send mail
            $this->envia_correo();
            //cambiar status
            $sql =<<<EOF
                update notificartb set notificado=1;
            EOF;
            
            $this->db->query($sql);           
            
	}       
	else 
	{
	   echo 'No envia mail';
	} 
    } 

    public function quitarNotificar()
    {  
        $sql =<<<EOF
            update notificartb set notificado=0;
        EOF;
        
        $this->db->query($sql);
     
    }

    public function envia_correo()
    {
	$headers = [
            'TOKEN: D75918C41FA023B4BDF2B37387715E000BC998B0B5DDEB5AD73F9A1C413C5219DAFBEE21A552837938575FC596CDC856F659B55CD3909BB45C3EDA91386EE101',
            'Content-Type: application/json'
        ];
        
        $url = "http://10.0.3.37/api/MonitorApps";
        $curl = curl_init();
        $params = ["Servicio" => "VPN MQ GyT"];
        $params  = json_encode($params);
        
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        $result = curl_exec($curl);
    
        curl_close($curl);


    }
}
