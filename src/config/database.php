<?php

define("DB_HOST", '127.0.0.1');
define("DB_PORT", '3308');
define("DB_NAME", 'bookshelf');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_DSN", sprintf("mysql:host=%s;port=%s;dbname=%s", DB_HOST, DB_PORT, DB_NAME));

?>