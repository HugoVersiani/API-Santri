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
    }