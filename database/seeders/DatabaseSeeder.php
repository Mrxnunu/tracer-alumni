<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Parameter;
use App\Models\Periode;
use App\Models\Post;
use App\Models\Topik;
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


        Topik::create([
            'kd_topik' => 'A',
            'topik' => 'Data Diri Alumni'
        ]);
        Topik::create([
            'kd_topik' => 'B',
            'topik' => 'Pekerjaan Setelah lulus'
        ]);
        Topik::create([
            'kd_topik' => 'C',
            'topik' => 'Perusahann'
        ]);


        // ini id periode ke 1
        Periode::create([
            'nama_periode' => "2020"
        ]);
        // ini id periode ke 2
        Periode::create([
            'nama_periode' => "2019"
        ]);
        // ini id periode ke 3
        Periode::create([
            'nama_periode' => "2021"
        ]);

        Parameter::create([
            'topik_id' => 1,
            'priode_id' => 1,
            'parameter' => "Nama Alumni"
        ]);
        Parameter::create([
            'topik_id' => 2,
            'priode_id' => 1,
            'parameter' => "Tempat Kerja "
        ]);
        Parameter::create([
            'topik_id' => 3,
            'priode_id' => 1,
            'parameter' => "Profil Perushaan "
        ]);

        Answer::create([
            "id_parameter" => 1,
            "jawaban" => "Muhammad Ibnu Mahjub"
        ]);
        Answer::create([
            "id_parameter" => 2,
            "jawaban" => "Kementerian Informatika"
        ]);
        Answer::create([
            "id_parameter" => 1,
            "jawaban" => "Bagas Maulana"
        ]);
        Answer::create([
            "id_parameter" => 2,
            "jawaban" => "Kementrian Keuangan"
        ]);
    }
}
