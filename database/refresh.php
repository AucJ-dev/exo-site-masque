<?php

namespace Jay\database;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$pdo = new \PDO($_ENV['CONNECT_DB']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("
    DO $$ DECLARE
        r RECORD;
    BEGIN
        FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = current_schema()) LOOP
            EXECUTE 'DROP TABLE IF EXISTES ' || quote_ident(r.tablename) || ' CASCADE';
        END LOOP;
    END $$;
")


$pdo->exec('CREATE TABLE users (
    id SERIAL,
    email TEXT,
    firstname TEXT,
    lastname TEXT,
    adresse TEXT,
    numbmembers INT,
    password TEXT
    )');