<?php

declare(strict_types=1);

require 'app/services/autoload.php';

use Illuminate\Database\Schema\Blueprint;

try {
    if (!$capsule->getConnection()->getSchemaBuilder()->hasTable('token')) {
        dump('Migrating tables');
        $capsule->getConnection()
            ->getSchemaBuilder()
            ->create(
                'token',
                static function (Blueprint $blueprint): void {
                    $blueprint->id();
                    $blueprint->string('access_token');
                    $blueprint->string('refresh_token');
                    $blueprint->integer('expires_in');
                }
            );
        dump('Tables migrated');
    }
    dump('Tables are already migrated');
} catch (Throwable $exception) {
    dd($exception->getMessage());
}
