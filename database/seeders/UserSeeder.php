<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use Carbon\Carbon;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        /* 
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@test.com',
            'password' => Hash::make('password'),
            'created_at'=> Carbon::now(),
        ]);
        */

        User::factory()->count(5)->create();
    }
}
