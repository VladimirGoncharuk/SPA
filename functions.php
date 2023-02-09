<?php

function getUsersList() {
    $users = require __DIR__.'/BD.php';
    return $users;
}
function existsUser($login){
$users = require __DIR__.'/BD.php';   
 foreach($users as $user ) {
if($user['login']=== $login){
 return true;
}
 } 
return false; 
}
function checkPassword( $login, $password) {
    $users = getUsersList();
    foreach($users as $user ) {
   if($user['login']=== $login
   && $user['password']=== $password ){
    return true;
   }
    } 
   return false; 
   }

function getCurrentUser() {
$logincookie=$_COOKIE['login'] ?? null;
$passwordcookie = $_COOKIE['password']??null;
if(checkPassword($logincookie, $passwordcookie)){
    return $logincookie;
}

return null;    
}

   