<?php 

    class TopAz extends Controller {
        public static function index(){
            $info = [];
         $content = $this->Curl('/');
         $title = $this->Parse($content,"<title>(.*?)</title>")[1][0];
         $phone = $this->Parse($content,'<a class="bar-phones-i" href="(.*?)">(.*?)</a>')[1][1];
         $visitUser = $this->Parse($content,'<div class="statistic-counters-quantity day-visits">(.*?)</div>')[1][0];
         $visitSite = $this->Parse($content,'<div class="statistic-counters-quantity day-hits">(.*?)</div>')[1][0];
            array_push($info,[
                'title'=>$title,
                'phone'=>$phone,
                'VisitUser'=>strip_tags($visitUser),
                'VisirSite'=>strip_tags($visitSite)
                ]);
        $this->JSON($info);
        }
    }


?>