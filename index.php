<?php

    function __autoload($classname){
        require_once("$classname.php");
    }

    include_once('core.php');

    if(isset($_SERVER['PATH_INFO'])){
        $route=explode('/',$_SERVER['PATH_INFO']);
    }
    else{
        $route=array('','api','list');
    }

    $skip=array(0,1,2);
    $prm=[];

    foreach($route as $key => $val){
        if(!in_array($key,$skip)){
            $prm[]=$val;
        }
    }

    $response=call_user_func_array(array($route[1],$route[2]),$prm);

