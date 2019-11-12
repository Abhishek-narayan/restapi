<?php 

    Class Response{
        
        private $data;

        private $allowedPrm;

        private $postData;

        public function __construct(){
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: POST");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        }

        public static function json_response($data=array()){
            return json_encode($data);
        }

        public static function fetch($sql){
            while($row=mysqli_fetch_assoc($sql)){
                $data[]=$row;
            }
            return $data;
        }

        public static function getPostRequest(){
            $postData=file_get_contents('php://input');
            return json_decode($postData);
        }

        public static function allowParameter($prm=array()){
            $postData=json_decode(file_get_contents('php://input'));
            $error=false;
            foreach($postData as $key => $val){
                if(!in_array($key,$prm)){
                    $error=true;
                    break;
                }
                continue;
            }

            if($error){
                echo json_encode(array('header'=>array('status'=>'false','code'=>''),'body'=>array('msg'=>'Some Parameters is not allowed')));
            }
            else{
                return true;
            }
        }

    }