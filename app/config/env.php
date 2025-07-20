<?php

// Charger .env une seule fois
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->safeLoad();

$dsnMysql = "{$_ENV['MYSQL_DRIVER']}:host={$_ENV['MYSQL_DB_HOST']};port={$_ENV['MYSQL_DB_PORT']};dbname={$_ENV['MYSQL_DB_NAME']}";

$dsnPostgres = "{$_ENV['POSTGRES_DRIVER']}:host={$_ENV['POSTGRES_DB_HOST']};port={$_ENV['POSTGRES_DB_PORT']};dbname={$_ENV['POSTGRES_DB_NAME']}";

// Pour switcher entre PostgreSQL et MySQL, changer DSN_POSTGRES ou DSN_MYSQL
define('DB_DRIVER', $_ENV['DB_DRIVER']);
if (DB_DRIVER === 'mysql') {
    define('DSN', $dsnMysql);
    define('DB_HOST',  $_ENV['MYSQL_DB_HOST']);
    define('DB_PORT',  $_ENV['MYSQL_DB_PORT']);
    define('DB_NAME',  $_ENV['MYSQL_DB_NAME']);
    define('DB_USER',  $_ENV['MYSQL_DB_USER']);
    define('DB_PASS',  $_ENV['MYSQL_DB_PASS']);
} elseif (DB_DRIVER === 'pgsql') {
    define('DSN', $dsnPostgres);
    define('DB_HOST',  $_ENV['POSTGRES_DB_HOST']);
    define('DB_PORT',  $_ENV['POSTGRES_DB_PORT']);
    define('DB_NAME',  $_ENV['POSTGRES_DB_NAME']);
    define('DB_USER',  $_ENV['POSTGRES_DB_USER']);
    define('DB_PASS',  $_ENV['POSTGRES_DB_PASS']);
} else {
    die("Driver de base de données non supporté.");
}
define('WEB_ROUTE', $_ENV['WEB_ROUTE']);
define('UPLOAD_DIR', $_ENV['UPLOAD_DIR']);