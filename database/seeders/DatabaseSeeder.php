<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'role' => 'customers'
        ]);

        Kategori::create([
            'name' => 'Gadget'
        ]);

        Kategori::create([
            'name' => 'Fashion'
        ]);

        Kategori::create([
            'name' => 'Food&Drinks'
        ]);

        Produk::create([
            'kategori_id' => 1,
            'name' => 'Asus ROG 6',
            'price' => 10000000,
            'image' => 'rog6.jpg'
        ]);

        Produk::create([
            'kategori_id' => 2,
            'name' => 'Naruto T-Shirt',
            'price' => 180000,
            'image' => 'narutotshirt.jpg'
        ]);

        Produk::create([
            'kategori_id' => 3,
            'name' => 'Burger King',
            'price' => 100000,
            'image' => 'burger.png'
        ]);
    }
}
