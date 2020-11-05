<?php
ini_set( "display_errors", false );
date_default_timezone_set( "Europe/Kiev" );
define( "DB_DSN", "mysql:host=localhost;dbname=currencyex" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
require_once( "classes/History.php" );
require_once( "classes/ExchangeRates.php" );
?>
