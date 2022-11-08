<?php

use app\routes\Router;
require '../vendor/autoload.php';

session_start();

Router::run();
