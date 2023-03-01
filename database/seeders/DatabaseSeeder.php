<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Materi;
use App\Models\Category;
use App\Models\Chalengge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Chalengge::create([
            'name' => 'SQLI Show Database Version',
            'slug' => 'sqli-show-database-version',
            'description' => 'Ini deskripsi',
            'answer' => 'version10',
            'point' => '20',
            'link' => 'https://www.google.com/',
            'user_id' => 1,
            'category_id' => 1

        ]);

        Chalengge::create([
            'name' => 'SQLI Find Number Of Column',
            'slug' => 'sqli-find-number-of-column',
            'description' => 'Ini deskripsi dua',
            'answer' => '4',
            'point' => '25',
            'link' => 'https://www.google.com/',
            'user_id' => 2,
            'category_id' => 2

        ]);

        Chalengge::create([
            'name' => 'Cookie',
            'slug' => 'cookie',
            'description' => 'Ini deskripsi cookie',
            'answer' => 'my cookie',
            'point' => '40',
            'link' => 'https://www.google.com/',
            'user_id' => 1,
            'category_id' => 3
        ]);

        Chalengge::create([
            'name' => 'SQLI By Pass Login',
            'slug' => 'sqli-by-pass-login',
            'description' => 'Ini deskripsi 3',
            'answer' => 'admin',
            'point' => '50',
            'link' => 'https://www.google.com/',
            'user_id' => 1,
            'category_id' => 1
        ]);

        Chalengge::create([
            'name' => 'SQLI By Pass Login 2',
            'slug' => 'sqli-by-pass-login-2',
            'description' => 'Ini deskripsi 3',
            'answer' => 'admin',
            'point' => '50',
            'link' => 'https://www.google.com/',
            'user_id' => 1,
            'category_id' => 1
        ]);

        Chalengge::create([
            'name' => 'SQLI By Pass Login 3',
            'slug' => 'sqli-by-pass-login-3',
            'description' => 'Ini deskripsi 3',
            'answer' => 'admin',
            'point' => '50',
            'link' => 'https://www.google.com/',
            'user_id' => 1,
            'category_id' => 1
        ]);

        Chalengge::create([
            'name' => 'SQLI By Pass Login 4',
            'slug' => 'sqli-by-pass-login-4',
            'description' => 'Ini deskripsi 3',
            'answer' => 'admin',
            'point' => '50',
            'link' => 'https://www.google.com/',
            'user_id' => 1,
            'category_id' => 1
        ]);
        
        // User::factory(10)->create();
        User::create([
            'name' => 'hermansyah',
            'username' => 'herman',
            'email' => 'syahh460@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('oppoa37F')
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('ourpassword')
        ]);

        Category::create([
            'name' => 'Web Security',
            'slug' => 'web-security'
        ]);

        Category::create([
            'name' => 'Digital Forensic',
            'slug' => 'digital-forensic'
        ]);

        Category::create([
            'name' => 'Cryptography',
            'slug' => 'cryptography'
        ]);

        Materi::factory(30)->create();
    }
}
