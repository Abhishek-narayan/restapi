<?php 

    Class Response{
        
        private $data;

        function json_response($data=array()){
            header('Content-type:application/json;charset=utf-8');
            return json_encode($data);
        }

        function fetch($sql){
            while($row=mysqli_fetch_assoc($sql)){
                $data[]=$row;
            }
            return $data;
        }

    }