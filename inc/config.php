<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 */

$config = array(
    // Configuration for mysql database server
    'pdo_dsn' => 'mysql:host=localhost;dbname=webshop',
    'pdo_user' => 'root',
    'pdo_password' => '',
    'pdo_config' => array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => false
    ),
    // Debugging settings
    'debug' => false
);
