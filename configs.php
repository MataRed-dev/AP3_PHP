<?php

$DB_SERVER = getenv("MVC_SERVER") ?: "phpmyadmin.ap3.local.dombtsig.local";
$DB_DATABASE = getenv("MVC_DB") ?: "bgs-corp";
$DB_USER = getenv("MVC_USER") ?: "bgs-corp-1";
$DB_PASSWORD = getenv("MVC_TOKEN") ?: "NDkm5pBn";
$DEBUG = getenv("MVC_DEBUG") ?: true;

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG
);

