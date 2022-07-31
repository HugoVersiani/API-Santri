<?php
    namespace App\models;
    
    class Users {
        private static $table = 'usuarios';

        public static function verifyUser($data) {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
            $sql = 'SELECT * FROM ' .self::$table. ' WHERE login = :lo AND senha = :se and ativo = "S"';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindvalue(':lo', $data['login']);
            $stmt->bindvalue(':se', $data['password']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {  
                return true;
            } 

            return false;

        }

        public static function getAll() {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
            $sql = 'SELECT * FROM ' .self::$table;
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) { 
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }else {
                throw new \Exception("Usuários não encontrados.");
            }
        }

        public static function searchUser($data) {
                $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
                $sql = 'SELECT * FROM ' .self::$table.' WHERE NOME_COMPLETO LIKE CONCAT("%", :na, "%")';
                $stmt = $connPdo->prepare($sql);
                $stmt->bindvalue(':na', $data);
                $stmt->execute();
                if ($stmt->rowCount() > 0) { 
                    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                }else {
                    throw new \Exception("Usuários não encontrados.");
                }
        }

        public static function registerNewUser($data) {
            
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

            $sql = 'INSERT INTO usuarios (LOGIN, SENHA, NOME_COMPLETO) VALUE (:lo, :se, :nc)';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindvalue(':lo', $data['login']);
            $stmt->bindvalue(':se', $data['password']);
            $stmt->bindvalue(':nc', $data['fullname']);
            $stmt->execute();
            $userId=$connPdo->lastInsertId();
           
            foreach($data['autorizations'] as $autorization){

                $sql = 'INSERT INTO autorizacoes (USUARIO_ID, CHAVE_AUTORIZACAO) VALUE (:ui, :ca)';
                $stmt = $connPdo->prepare($sql);
                $stmt->bindvalue(':ui', $userId);
                $stmt->bindvalue(':ca', $autorization);
                $stmt->execute();
            }
            
            if ($stmt->rowCount() > 0) {

                return "Usuário cadastrado com sucesso";
            }
            
            throw new \Exception("Não foi possivel cadastrar o usuário.");
            
        }

        public static function deleteUserById($data) {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
            $sql = "DELETE FROM usuarios WHERE USUARIO_ID=:id";
            $stmt = $connPdo->prepare($sql);
            $stmt->bindvalue(':id', $data);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Usuário deletado com sucesso";
            } else {
                throw new \Exception("Não foi possivel deletar o usuário.");
            }
            
            
        }

  
  
  
        }