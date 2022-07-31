<?php 

    namespace App\controllers;
    use App\models\Users;

    class Auth {
        public function login(){
            
            $data = json_decode(file_get_contents("php://input"), true);

            $userExists = Users::verifyUser($data);

            if($userExists) {
           
                $key = '123456';

                $header = [
                    'typ' => 'JWT',
                    'alg' => 'HS256'
                ];

                $payload = [
                    
                    'name' => $data['login'],
                    'email' => $data['password'],
                ];

                $header = json_encode($header);
                $payload = json_encode($payload);

                $header = base64_encode($header);
                $payload = base64_encode($payload);

                $sign = hash_hmac('sha256', $header . "." . $payload, $key, true);
                $sign = base64_encode($sign);

                $token = $header . '.' . $payload . '.' . $sign;

                return $token;
            } 
            throw new \Exception('Usuário não autenticado');
        }

        public static function checkAuth(){
            
             //Obtendo autorização do header

             $http_header = apache_request_headers();
             

            if(isset($http_header['Authorization']) && $http_header['Authorization'] !=null) {
                
                $bearer = explode (' ', $http_header['Authorization']);
                $token = explode('.', $bearer[1]);
                
                $header = $token[0];
                $payload = $token[1];
                $sign = $token[2];

                //Conferindo assinatura
                $valid = hash_hmac('sha256', $header . "." . $payload, '123456', true);
                $valid = base64_encode($valid);

                if($sign === $valid) {
                    return true;
                }
            }

            return false;

        }

    }