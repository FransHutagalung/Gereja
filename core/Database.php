<?php
namespace Core;
use Core\Router ;

class Database {
  protected $config = [];
  protected $user ;
  protected $pass ;
  protected $statement ;

  public function __construct($Config ,$user = "root" , $password = "adhi123"){
    $this->user = $user;
    $this->pass = $password;
    $this->config = $Config;
}

public function Connection($Config){

  $dsn = 'mysql:'.http_build_query($Config ,'' , ';');

  try {
      return new \PDO($dsn , $this->user , $this->pass , [
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
  } catch(\PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
public function query( $query ,$params = [] ){
  $this->statement = $this->Connection($this->config)->prepare($query);
  $this->statement->execute($params);
  return  $this;
}

public function find(){
  return $this->statement->fetch();
}
public function fetchAll(){
  return $this->statement->fetchAll();
}

public function findOrfail(){
   $note =$this->find();
   if(!$note){
    Router::abort();
   }

   return $note;


}

}