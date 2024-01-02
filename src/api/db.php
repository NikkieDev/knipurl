<?php

class DataBase
{
  function __construct() {
    $this->conn = connect();
  }

  public function connect(){}
  public function find_user(int $uid){}
  public function find_url(string $code){}
  public function find_last_url(){}
  public function find_last_user(){}
  
  public function update_user(int $uid){}
  public function update_url(string $code){}
  
  public function delete_user(int $uid){}
  public function delete_url(string $code){}
}

?>