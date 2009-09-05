<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("memory_limit", "64M");
define("MEMCACHE_ENABLED", true);

require_once("config.php");
require_once("functions.php");
require_once("constants.php");
require_once("FirePHPCore/fb.php");
ob_start();

if (class_exists("Memcache") && MEMCACHE_ENABLED) {
  $memcache_on = true;
} else {
  $memcache_on = false;
}

$ldapconn = get_ldap_connection();

if ($memcache_on) {
  $memcache = new Memcache;
  $memcache->connect("localhost", 11211);
}
