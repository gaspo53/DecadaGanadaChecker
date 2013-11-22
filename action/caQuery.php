<?php
 
        // decadaGanada.php - Otro logro de la Cristi
        // Se llama de la forma: decadaGanada.php?id=721004894&producto=RD&pais=AR
 
        function doPostRequest($url, $data, $optionalHeaders = null)
        {
             $params = array('http' => array(
                          'method' => 'POST',
                          'content' => $data
                       ));
             if ($optionalHeaders !== null) {
               $params['http']['header'] = $optionalHeaders;
             }
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
 
        if (empty($_GET)){
                echo "Ejemplos:<br>
                        Inter: www.dajuam.com.ar/decadaGanada.php?action=oidn&id=RBtuNumeroCN<br>
                        Nacio: www.dajuam.com.ar/decadaGanada.php?id=tuNumero&producto=RD&pais=AR&action=ondnc";
        } else {
                $id = $_GET['id'];
                $producto = $_GET['producto'];
                $pais = $_GET['pais'];
                $action = $_GET['action']; // ondnc o oidn
                $api = "http://www.correoargentino.com.ar/sites/all/modules/custom/ca_forms/api/ajax.php";
 
                $dataArray = array('id' => $id, 'producto' => $producto, 'pais' => $pais, 'action' => $action);
                $data = http_build_query($dataArray);
 
                echo doPostRequest($api, $data);
        }
?>