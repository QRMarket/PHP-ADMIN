<?php 
require_once '/Users/ulakbim/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('/Applications/MAMP/htdocs/WEB-Portal/GuppyAdmin/web/');
$twig = new Twig_Environment($loader, array());

   $config['host'] = 'http://192.168.35.123:8080/QR_Market_Web/';

   abstract class RESULT
   {
      const SUCCESS = "GUPPY.001";
      const FAILURE_PROCESS = "GUPPY.600";
      // etc.
   }

   function get_data($url, $params, $ct) {
    
    $ch = curl_init();
    $timeout = 5;
    

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                            $ct, "ACCEPT: */*"
                                            ));
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
   }