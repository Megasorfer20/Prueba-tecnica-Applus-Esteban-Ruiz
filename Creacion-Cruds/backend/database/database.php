<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$env = parse_ini_file(".env");

if (!defined("DBTYPE")) {
    define("DBTYPE", $env['DBTYPE']);
}
if (!defined("DBHOST")) {
    define("DBHOST", $env['DBHOST']);
}
if (!defined("DBNAME")) {
    define("DBNAME", $env['DBNAME']);
}
if (!defined("DBUSER")) {
    define("DBUSER", $env['DBUSER']);
}
if (!defined("DBPASSWORD")) {
    define("DBPASSWORD", $env['DBPASSWORD']);
}

?>