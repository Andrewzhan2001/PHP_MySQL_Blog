<?php
define('dbHost', getenv("DB_HOST"));
define('dbUser', getenv("DB_USERNAME"));
define('dbPass', getenv("DB_PASSWORD"));
define('dbName', getenv("DB_DATABASE"));
session_start();