<?php 

    class TopAzCategory  extends Controller{
        public function index(){
            $json = [];
            $content = file_get_contents("https://tap.az/");
            preg_match_all('@<a class="header-category (.*?)" data-for="(.*?)" href="/elanlar/(.*?)"><div class="header-category-icon"></div><span>(.*?)</span></a>@',$content,$response);
            unset($response[3]);
            for($i = 0;$i<count($response[4]);$i++)
                {
                    array_push($json,[
                        'title'=>$response[4][$i],
                        'link'=>"/category/".html_entity_decode(strip_tags($response[2][$i]))
                        ]);
                }
                $this->JSON($json);
        }

        public static function categoryDetail($name = null){
            $json = [];
            $content = $this->Curl('/elanlar/'.$name[1]."/".$name[2]);
            $parcala = $this->Parse($content,'<a target="_blank" class="products-link" href="(.*?)"><div class="products-top"><img alt="(.*?)" loading="lazy" src="(.*?)" /><div class="products-price-container"><div class="products-price">(.*?)</div></div></div><div class="products-name">(.*?)</div><div class="products-created">(.*?)</div><div class="products-paid"><span class="featured-icon"></span><span class="vipped-icon"></span></div></a>');
            unset($parcala[0]);
            for($i = 0;$i<count($parcala[1]);$i++)
                {
                    
                    array_push($json,['link'=>html_entity_decode(strip_tags(str_replace("/elanlar/","/product/",$parcala[1][1]))),'title'=>html_entity_decode(strip_tags($parcala[2][$i])),'image'=>html_entity_decode(strip_tags($parcala[3][$i])),'price'=>html_entity_decode(strip_tags($parcala[4][$i])),'date'=>html_entity_decode(strip_tags($parcala[6][$i]))]);
                }
                $this->JSON($json);
        }

      
    }


?>