<?php

namespace App\Http\Login;



$_SESSION["isLogged"]=false;
$_SESSION["id"]=null;
$_SESSION["email"]=null;
$_SESSION["userType"]=null;

class Login {
  
  public function loggin($id, $email, $type){
    $_SESSION["isLogged"]=true;
    $_SESSION["id"]=$id;
    $_SESSION["email"]=$email;
    $_SESSION["userType"]=$type;
  }
}