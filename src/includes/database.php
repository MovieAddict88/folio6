<?php
// Make sure the config file is loaded
if (!file_exists(__DIR__ . '/../../config/config.php')) {
    die('Configuration file not found. Please run install.php');
}

require_once __DIR__ . '/../../config/config.php';

function db_connect() {
    try {
        if (DB_TYPE === 'sqlite') {
            $dbh = new PDO('sqlite:' . DB_PATH);
        } else {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        }
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
}
?>