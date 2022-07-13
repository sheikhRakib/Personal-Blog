<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@pb.com',
            'password' => Hash::make('admin'),
        ]);

        Setting::factory()->create([
            'name' => 'Example.com',
            'copyright' => 'RI',
            'description' => 'Simple Personal Website',
        ]);

        Category::factory(5)->create();
        Tag::factory(6)->create();
        Post::factory(20)->create();
    }
}
