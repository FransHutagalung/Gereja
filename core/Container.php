<?php

namespace Core;

class Container{

  protected $binding = [];

  public function bind($key , $resolver){
    $this->binding[$key] = $resolver;
  }

  public function resolve($key){

    if(! array_key_exists($key , $this->binding)){
      throw new \Exception("Error Processing The Key {$key}");

    }

     $resolver = $this->binding[$key];
     return call_user_func($resolver);
  }



}