<?php
    
    class Api{

        function __construct(){

        }

        function create(){
            echo 'create';
        }

        function update(){
            echo 'update';
        }

        function delete(){
            echo 'delete';
        }

        function list(){

            $sql=Core::query("SELECT * FROM `users`");
            
            $data=Response::fetch($sql);

            echo Response::json_response($data);
        }

    }