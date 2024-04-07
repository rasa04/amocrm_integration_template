<?php

declare(strict_types=1);

// env variables
$dotenv = Dotenv\Dotenv::createImmutable(sprintf('%s%s', __DIR__, '/../..'));
$dotenv->load();
