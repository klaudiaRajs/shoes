<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use PDO;
use PDOException;

class SetUp extends Command
{
    protected $signature = 'application:setUp';

    protected $description = 'Sets up application database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = env('DB_DATABASE', false);

        if (!$database) {
            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

        try {
            $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));

            $pdo->exec(sprintf(
                    'CREATE DATABASE IF NOT EXISTS %s;',
                    $database)
            );

            $this->info(sprintf('Successfully created %s database', $database));
        }catch (PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }

        try {
            Artisan::call('migrate:refresh');
            Artisan::call('db:seed');
            $this->info('Successfully migrated and seeded the database');
        }catch (\Exception $e) {
            $this->error('Failed to migrate or seed the database');
        }

        return 0;
    }

    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
