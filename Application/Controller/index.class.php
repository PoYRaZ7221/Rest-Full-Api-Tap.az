<?php 

$BaseURL = "https://tap.az/";

    class Controller {
        public static function Curl($url){
            global $BaseURL;
                return file_get_contents($BaseURL.$url); 
        }

        public function Parse($content,$parse)
            {
                preg_match_all('@'.$parse.'@',$content,$response);
                return $response;
            }

        public function  JSON ($content){
           return  print_r(json_encode($content));
        }
    }
    


?>