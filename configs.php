<?php

$DB_SERVER = getenv("MVC_SERVER") ?: "192.168.48.12";
$DB_DATABASE = getenv("MVC_DB") ?: "Formaflix";
$DB_USER = getenv("MVC_USER") ?: "prof";
$DB_PASSWORD = getenv("MVC_TOKEN") ?: "azerty";
$DEBUG = getenv("MVC_DEBUG") ?: true;

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG
);

