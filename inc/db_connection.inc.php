<?php

// error_reporting(0); // for the production
error_reporting(E_ALL); // For the development
date_default_timezone_set('Europe/Berlin');

// local
define('DB_HOST', 'localhost'); // => here your HOST NAME
define('DB_NAME', 'page_o_builder');  // here your DATABASE NAME
define('DB_USER', 'root');  // here your USER NAME
define('DB_PASSWORD', '');  // here your PASSWORD

// define('DB_ERRMODE', PDO::ERRMODE_SILENT);  // for the production
define('DB_ERRMODE', PDO::ERRMODE_EXCEPTION); // For the development
define('DB_FETCH_MODE', PDO::FETCH_ASSOC);

$options = [
  PDO::ATTR_ERRMODE => DB_ERRMODE,
  PDO::ATTR_DEFAULT_FETCH_MODE => DB_FETCH_MODE,
  PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
];

try {
  $db = new PDO(
    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
    DB_USER,
    DB_PASSWORD,
    $options
  );
} catch (PDOException $e) {
  echo json_encode([0, "ERROR IN THE DATABASE CONNECTION: " . $e->getMessage()]);
  die();
}

$db->query('SET NAMES utf8');
