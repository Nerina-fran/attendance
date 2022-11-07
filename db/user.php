<?php


    class user {
        // private database object\
        private $db;

        // constructor to initialize private to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
    }

    public function insertUser($username,$password){
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO users (username, password) VALUES(:username, :password)";
            // prepare sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':username',$username);
            $stmt->bindparam(':password',$password);
            
            // excute statement
            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    } 
    public function getuser($username,$password){
        try{
            $sql = "select * from users where username = username AND password" = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
?>