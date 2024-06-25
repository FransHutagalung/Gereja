<?php

namespace Core;


class ValidationException extends \Exception{


  // variabel just only can read in this class
  public readonly array $errors;
  public readonly array $old;

  public static function throw($error , $old){
    $instance = new static;
    $instance->errors = $error;
    $instance->old = $old;
    throw $instance;
  }

}

