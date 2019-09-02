<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\UserProfile::class, 30)->create();
//        DB::table('user_profiles')->insert([
//            'user_id' => mt_rand(1,10),
//            'bio' => 'sing',
//            'city' => 'jinan',
//            'hobby' => 'make'
//        ]);
        //
    }
}
