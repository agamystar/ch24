<?php

if (!function_exists("config")) {
    function config(string $key=null)
    {
         $config=[
            "APP_ROOT" => __DIR__ . "../../",

            "db" => [
                "DB_HOST" => 'localhost',
                "DB_USER" => 'root',
                "DB_PASS" => '',
                "DB_NAME" => 'mvc'
           ]
        ];
         if($key==null){
             return $config;
         }else{
             return $config[$key];
         }

    }
}