<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Topic;
use App\Models\Course;
use App\Models\Series;
use App\Models\Platform;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $series = ['PHP', 'Tailwind CSS', 'Laravel', 'Vue.JS', 'Livewire', 'WordPress'];
        foreach($series as $item){
            Series:: create([
                'name'=> $item,
            ]);
        }

        $topics = ['Eloquent', 'Validation', 'Refactoring', 'Testing', 'Middleware', 'Permission'];
        foreach($topics as $item){
            Topic:: create([
                'name'=> $item,
            ]);
        }

        $platforms = ['Laracast', 'Udemy', 'Laravel Daily', 'Youtube', 'Larajobs'];
        foreach($platforms as $item){
            Platform:: create([
                'name'=> $item,
            ]);
        }

        User::factory(50)->create();
        Course::factory(100)->create();

    }
}
