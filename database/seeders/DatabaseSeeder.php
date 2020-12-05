<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $blogFaker  = Faker::create();
        $min_user_id = DB::table('users')->min('id');
        $max_user_id = DB::table('users')->max('id');
        $user_id = rand($min_user_id,$max_user_id); // generating a random user id to be use on Faker
        //seeding blog_models Table
        foreach (range(1,30) as $index) {
            DB::table('blog_models')->insert([
                'title' => $blogFaker->title,
                'blog_description' => 'Blog description',
                'user_id' => $user_id
            ]);
        }


        //seeding users Table
        DB::table('users')->insert([
           'name'=>Str::random(10),
           'email'=>Str::random(10).'@gmail.com',
           'password'=>Str::random(10)
        ]);

    }
}
