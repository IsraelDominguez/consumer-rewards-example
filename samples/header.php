<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use Dotenv\Dotenv;

// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Load env variables
// https://github.com/vlucas/phpdotenv#usage
$dotenv = new Dotenv(__DIR__.'/../','.env.test');
$dotenv->load();
