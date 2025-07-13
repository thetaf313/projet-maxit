<?php

// Charger .env une seule fois
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->safeLoad();

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DSN_POSTGRES', $_ENV['DSN_POSTGRES']);
define('DSN_MYSQL', $_ENV['DSN_MYSQL']);
define('WEB_ROUTE', $_ENV['WEB_ROUTE']);
define('UPLOAD_DIR', $_ENV['UPLOAD_DIR']);