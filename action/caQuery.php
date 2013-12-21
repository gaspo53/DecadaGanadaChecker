<?php
        // decadaGanada.php - Otro logro de la Cristi
        // Se llama de la forma: decadaGanada.php?id=721004894&producto=RD&pais=AR
        function doPostRequest($url, $data)
        {
             $params = array('http' => array(
		                          'method' => 'POST',
		                          'content' => $data,
             					  'header' => 'Origin: http://www.correoargentino.com.ar\r\n'
             				));

             $ctx = stream_context_create($params);
             $fp = @fopen($url, 'rb', false, $ctx);
             if (!$fp) {
               throw new Exception("Problema con $url, $php_errormsg");
             }
             $response = @stream_get_contents($fp);
             if ($response === false) {
               throw new Exception("Problema leyendo los datos desde $url, $php_errormsg");
             }
             return $response;
        }
 
        function getApi($correo, $id = null){
            if ($correo == "CA"){
                $api = "http://www.correoargentino.com.ar/sites/all/modules/custom/ca_forms/api/ajax.php";
            } else {
            	if ($correo == "OCA") {
                	$api = "http://webservice.oca.com.ar/oep_tracking/Oep_Track.asmx/Tracking_Pieza?CUIT=&NroDocumentoCliente=&Pieza=";
            	}
            }
            return $api;
        }

        if (!empty($_GET)){

            $correo = $_GET['correo'];
            $id = $_GET['id'];
            $api = getApi($correo, $id);
            
            if ($correo == "CA") {
                $producto = $_GET['producto'];
                $pais = $_GET['pais'];
                $action = $_GET['action']; // ondnc o oidn                
                $dataArray = array('id' => $id, 'producto' => $producto, 'pais' => $pais, 'action' => $action);
                $data = http_build_query($dataArray);
                $response =  doPostRequest($api, $data);
            } elseif ($correo == "oca") {
                $response = file_get_contents($api.$id);    
            }
            echo $response;
            
        }
?>