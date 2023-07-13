<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');

        Product::factory(5)->create();

        // $this->call(ProductSeeder::class);
        // User::factory()->create([
        //     'id' => 1,
        //     'name' => 'Ezequiel',
        //     'email' => 'ezequieldbo25@gmail.com',
        //     'password' => '123456789',
        // ]);
    }
}
