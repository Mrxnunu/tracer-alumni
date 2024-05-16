<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
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
            'name' => 'mrxnunu',
            'username' => 'mrxnununs',
            'email' => 'mrxnunu@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'bagas',
            'username' => 'gassd',
            'email' => 'bagas@gmail.com',
            'password' => bcrypt('12345')
        ]);


        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Bintang Sport',
            'slug' => 'bintang-sport'
        ]);
        Category::create([
            'name' => 'Kesehatan Jasmani',
            'slug' => 'kesehatan-jasmani'
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum quia hic odit consequuntur id voluptatum quaerat fugiat laborum enim doloremque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum quia hic odit consequuntur id voluptatum quaerat fugiat laborum enim doloremque ducimus recusandae ex excepturi, asperiores reiciendis officiis atque perspiciatis tempora temporibus totam possimus consectetur beatae saepe corrupti. Nemo, aspernatur fugiat.',
            'category_id' => 1,
            'user_id' => 1,
        ]);
        Post::create([
            'title' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum quia hic odit consequuntur id voluptatum quaerat fugiat laborum enim doloremque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum quia hic odit consequuntur id voluptatum quaerat fugiat laborum enim doloremque ducimus recusandae ex excepturi, asperiores reiciendis officiis atque perspiciatis tempora temporibus totam possimus consectetur beatae saepe corrupti. Nemo, aspernatur fugiat.',
            'category_id' => 2,
            'user_id' => 1,
        ]);
        Post::create([
            'title' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum quia hic odit consequuntur id voluptatum quaerat fugiat laborum enim doloremque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum quia hic odit consequuntur id voluptatum quaerat fugiat laborum enim doloremque ducimus recusandae ex excepturi, asperiores reiciendis officiis atque perspiciatis tempora temporibus totam possimus consectetur beatae saepe corrupti. Nemo, aspernatur fugiat.',
            'category_id' => 3,
            'user_id' => 2,
        ]);
    }
}
