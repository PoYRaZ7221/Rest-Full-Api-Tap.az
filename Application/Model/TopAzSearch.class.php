<?php 
		class TopAzSearch extends Controller {
					public static function Search($argc)
					{

							$content = $this->Curl('elanlar?utf8=✓&log=true&keywords='.$argc[1]);
							$response = $this->Parse($content,'<a target="_blank" class="products-link" href="(.*?)"><div class="products-top"><img alt="(.*?)" loading="lazy" src="(.*?)" /><div class="products-price-container"><div class="products-price">(.*?)</div></div></div><div class="products-name">(.*?)</div><div class="products-created">(.*?)</div><div class="products-paid"><span class="featured-icon"></span><span class="vipped-icon"></span></div></a>');
                    $json = [['url'=>"/search/{$argc[1]}",'Total'=>count($response[1])]];
							
			            unset($response[0]);
           				 for($i = 0;$i<count($response[1]);$i++)
                {
                    array_push($json,['link'=>html_entity_decode(strip_tags(str_replace("/elanlar/","/product/",$response[1][1]))),'title'=>html_entity_decode(strip_tags($response[2][$i])),'image'=>html_entity_decode(strip_tags($response[3][$i])),'price'=>html_entity_decode(strip_tags($response[4][$i])),'date'=>html_entity_decode(strip_tags($response[6][$i]))]);
                }
                $this->JSON($json);
					}
				}

?>