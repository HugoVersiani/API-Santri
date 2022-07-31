<?php
    namespace App\core;
    
    header("Content-Type: application/json; charset=UTF-8");

    class Controller {
        private $request;
        private $class;
        private $method;
        private $params = array ();
        public function __construct($req) {
            $this->request = $req;
            $this->load();

        }

        public function load() {
            $newUrl = explode('/', $this->request['url']);
            array_shift($newUrl);
           

            if (isset($newUrl[0])) {
                $this->class = ucfirst($newUrl[0]);
                array_shift($newUrl);

                if (isset($newUrl[0])) {
                    $this->method = $newUrl[0];
                    array_shift($newUrl);

                    if  (isset($newUrl[0])) {
                        $this->params = $newUrl;
            
                    }
                }
            }
        }

        public function run () {
            if(class_exists('\App\controllers\\'.$this->class) && method_exists('\App\controllers\\'.$this->class, $this->method)) {
                try {
                    $controll = "\App\controllers\\".$this->class;
                    $response = call_user_func_array(array(new $controll, $this->method), $this->params);
                  
                    return json_encode(array('data' => $response, 'status' =>'success'));
                } catch (\Exception $e) {
                    return json_encode(array('data' => $e->getMessage(), 'status' => 'erro'));
                }
            } else {
                return json_encode(array('status' => 'erro', 'data' => 'Operação Inválida'));
            }
       
        }
    }