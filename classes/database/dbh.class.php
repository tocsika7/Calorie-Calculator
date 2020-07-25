<?php

include 'includes/conf.inc.php';

class Dbh {

    private $servername;
    private $username;
    private $password; 
    private $dbname; 

    protected function connect(){
        $this->servername = SERVER_NAME;
        $this->username = USER_NAME;
        $this->password = PASSWORD;
        $this->dbname = DB_NAME;

        $conn = new mysqli($this->servername, $this->username,$this->password, $this->dbname);
        
        if($conn->connect_error){
            echo "Cannot connect to database \n" 
                . $conn->connect_error . "\n" 
                . $conn->connect_errno; 
        } else {
            return $conn;
        }
    }
}

