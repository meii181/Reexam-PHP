<?php

define('_NAME_MIN_LEN', 2);
define('_NAME_MAX_LEN', 10);
define('_PASSWORD_MIN_LEN', 7);
define('_PASSWORD_MAX_LEN', 15);
define('_ITEM_MIN_LEN', 5);
define('_ITEM_MAX_LEN', 20);

function _db(){

  $database_user_name = "root";
  $database_password = "";
  $database_connection = 'mysql:host=localhost; dbname=apple_pie; charset=utf8mb4';
  
  $database_options = [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];
  return new PDO($database_connection, $database_user_name, $database_password, $database_options);
  }
