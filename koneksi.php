<?php
class database{
 
    var $host = 'localhost';
    var $username = 'root';
    var $password = 'server01@';
    var $database = 'oop7';
    var $connection;
 
    public function mark(){
 
        $x = $this->database;
		return $x;
    }
	
    public function __construct(){
 
        if (!isset($this->connection)) {
 
            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
 
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
        return $this->connection;
    }
	
	//untuk cek user&pass harus sesuai dengan database
	public function check_login($username, $password){
 
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
 	
	//untuk ambil detail nama user&password
    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
 	
	//untuk hapus tanda baca & karakter khusus
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}

$user = new database();
?>