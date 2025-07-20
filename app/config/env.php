<?php

// Charger .env une seule fois
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->safeLoad();

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
// Pour switcher entre PostgreSQL et MySQL, changer DSN_POSTGRES ou DSN_MYSQL
define('DB_DRIVER', $_ENV['DB_DRIVER']);
define('DSN', $_ENV['DSN']);
define('DSN_MYSQL', $_ENV['DSN_MYSQL']);
define('WEB_ROUTE', $_ENV['WEB_ROUTE']);
define('UPLOAD_DIR', $_ENV['UPLOAD_DIR']);