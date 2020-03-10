<?php
    require 'Application/Controller/index.class.php';
    require 'Application/Controller/Router.class.php';

    Router::Run('/','TopAz@index');
    Router::Run('/category','TopAzCategory@index');
    Router::Run('/category/{value}','TopAzCategory@categoryDetail');
    Router::Run('/category/{value}/{value}','TopAzCategory@categoryDetail');
    Router::Run('/product/{value}/{value}/{value}','TopAzProduct@productDetail');
    Router::Run('/search/{value}','TopAzSearch@Search');
 

?>