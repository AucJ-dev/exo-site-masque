<?php

namespace Jay\database;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$pdo = new \PDO($_ENV['CONNECT_DB']);