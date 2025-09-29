<?php
// Make sure these constants are defined in your config.php
if (!defined('DB_HOST')) {
    die('Database configuration not found. Please run install.php');
}

function db_connect() {
    try {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
}
?>