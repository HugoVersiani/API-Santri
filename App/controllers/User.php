<?php 
    namespace App\controllers;
    use App\models\Users;

    class User {

        public function searchUser($name = null) {
          
            if(Auth::checkAuth()){
                if($name == null) {

                    return Users::getAll();
                }

                return Users::searchUser($name);
            }
            throw new \Exception("Usuário não autenticado");
        }

        public function registerNewUser() {
            if(Auth::checkAuth()){
                $data = json_decode(file_get_contents("php://input"), true);
            
                return Users::registerNewUser($data);                
            }
        }

    }