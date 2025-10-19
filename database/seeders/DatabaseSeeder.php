<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FilmeSeeder;
use Database\Seeders\ContatoSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
  public function run()
{
    $this->call([
        UserSeeder::class,
        FilmeSeeder::class,
        ContatoSeeder::class,
    ]);

}
}