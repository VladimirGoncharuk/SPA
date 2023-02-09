<?php
$password0= sha1('123');
$password1= sha1('234');
$password2= sha1('134');
$password3= sha1('124');
$password4= sha1('0123');


$users = [
     ['login' => 'user0', 'password' => "$password0"],
     ['login' => 'user1', 'password' => "$password1"],
     ['login' => 'user2', 'password' => "$password2"],
     ['login' => 'user3', 'password' => "$password3"],
     ['login' => 'user4', 'password' => "$password4"],
];

return $users;
