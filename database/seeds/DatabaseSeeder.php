<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'User',
            'email' => 'user@binus.ac.id',
            'password' => Hash::make('password'),
            'phone' => '087884645009',
        ]]);

        DB::table('categories')->insert([
            ['name' => 'Beach'],
            ['name' => 'Mountain'],
            ['name' => 'City'],
            ['name' => 'Village'],
            ['name' => 'Culture'],
        ]);
        
        $this->call(UserSeeder::class);
        // $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);

        DB::table('users')->insert([[
            'name' => 'Admin',
            'email' => 'admin@binus.ac.id',
            'password' => Hash::make('password'),
            'phone' => '087884645009',
            'role' => 'admin'
        ]]);
    }
}
