<?php

class User {
  public int $uid;
  public string $username;
  public string $hash;
}

class Session {
  public int $uid;
  public string $session_key;
  public int $active;
}

class DataBase
{
  function __construct() {
    $this->conn = NULL;
    $this->connect($this->conn);
  }

  function connect(&$conn){
    $svr = "localhost";
    $name = "dev";
    $passw = "dev";

    try {
      $conn = new PDO("mysql:host=$svr;dbname=knipurl", $name, $passw);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Connection failed");
    }
  }
  public function find_user(int $uid){
    $sql = "SELECT * from users WHERE `uid` = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $uid);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result_data = $stmt->fetchAll();

    return $result_data;
  }
  public function find_url(string $code){}
  public function find_last_url(){}
  public function find_last_user(){}
  
  public function update_user(int $uid){}
  public function update_url(string $code){}
  
  public function start_session(int $uid){}
  public function destroy_session(int $uid){}

  public function delete_user(int $uid){}
  public function delete_url(string $code){}

  public function test()
  {
    $sql = "CREATE TABLE IF NOT EXISTS Users(
      `uid` INT(12) AUTO_INCREMENT PRIMARY KEY
    );";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return;
  }
}

?>