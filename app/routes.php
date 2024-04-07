<?php

declare(strict_types=1);

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        require_once 'app/handlers/index.php';
        break;
    default:
        require_once 'app/handlers/404.php';
}
