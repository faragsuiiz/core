<?php

namespace Database\Seeders;

use Laravel\Passport\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class AppClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = ['android', 'ios', 'web'];

        foreach ($clients as $client) {
            if (Client::whereName($client)->count() === 0) {
                Artisan::call('passport:client', ['--name' => $client, '-q' => true]);
            }
        }
    }
}
