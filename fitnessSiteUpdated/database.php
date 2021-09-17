<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=fitness';
    private static $username = 'fitness';
    private static $password = 'password';
    private static $db;
    
    private function __construct(){}
    
    public static function getDB () {
        if (!isset(self::$db)) {
            try{
                self::$db = new PDO(self::$dsn,
                                    self::$username,
                                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
               // include('../errors/database_error.php');
                echo 'Database error.' . $error_message;
                exit();
            }
        }
        return self::$db;
    }
            
}
?>

