<?php 

    class TopAzProduct extends Controller {
        public static function productDetail($argc)
            {
                $content = $this->Curl("/elanlar/{$argc[1]}/{$argc[2]}/{$argc[3]}");
                $title = $this->Parse($content,'<script type="application/(.*?)">(.*?)</script>');
                print_r($title[2][0]);
            }
    }


?>