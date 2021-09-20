<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Product::factory(5)->create();
    }
}
