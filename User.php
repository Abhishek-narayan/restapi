<?php
    
    class User extends Response{

        function __construct(){
            parent::construct();
        }

        public function test(){
            $sql=Core::query("SELECT * FROM `users`");
            $data=Response::fetch($sql);
            echo Response::json_response($data);
        }

        public function create(){ //post request data
            Response::allowParameter(array('username','password'));
            $data=Response::getPostRequest();
            // request data in array 
        }

        public function update(){
            echo 'update';
        }

        public function delete(){
            echo 'delete';
        }


    }