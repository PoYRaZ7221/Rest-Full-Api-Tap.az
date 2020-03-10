<?php 

    class Router {

        public static function ParseURL () 
        {
            $scriptName = dirname($_SERVER["SCRIPT_NAME"]);
            return str_replace($scriptName,null ,$_SERVER['REQUEST_URI']);
        }

        public static function Run($url,$callback = null,$method = "get"){
            $REQUEST_URL = SELF::ParseURL();
            $patteres = [
                "{value}" => "([0-9a-zA-z_-]+)",
                "{id}" => "([0-9]+)"
            ];

            $url = str_replace(array_keys($patteres) , array_values($patteres) , $url);
            if(preg_match('@^'.$url.'$@',SELF::ParseURL(),$parameters)){
            unset($parameters[0]);
                if(is_callable($callback)){
                    @call_user_func($callback,$parameters);
                }
                $parse = @explode('@',$callback);
                if(file_exists("Application/Model/{$parse[0]}.class.php")){
                    require "Application/Model/{$parse[0]}.class.php";
                    @call_user_func([new $parse[0],$parse[1]],$parameters);
                }
            }
        } 
    }


?>