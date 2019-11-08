<?php
    
    Class Core{

        static function items($item=null){
            
            include_once('config.php');
            
            if(!isset($config[$item])){
                return false;
            }
            
            return $config[$item];
        }

        static function query($query=''){
            // self::items('hostname')
            //echo  self::items('username');
            // self::items('password')
            // self::items('database')

            $con=mysqli_connect('localhost','root','','api');
            
            if(!$con){
                echo "Database not connected!";
                return false;
            }

            $sql=mysqli_query($con,$query);
            return $sql;
        }

    }