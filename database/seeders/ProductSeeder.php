<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Carbon\Carbon;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
        DB::table('products')->insert([
            'name' => Str::random(10),
            'category' => Str::random(10),
            'description' => Str::random(20),
            'created_at'=> Carbon::now(),
        ]);
        */
        Product::factory()->count(10)->create();
    }
}
