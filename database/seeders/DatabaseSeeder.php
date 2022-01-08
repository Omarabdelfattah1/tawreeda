<?php

namespace Database\Seeders;

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
        // \App\Models\Admin::factory(1)->create();
        \App\Models\Buyer::factory(100)->hasUser(1)->create();
        \App\Models\Supplier::factory(100)->hasUser(1)->hasProducts(6)->create();
        
        \App\Models\Department::factory(2)
        ->has(
            \App\Models\Category::factory(8)
            ->has(\App\Models\Tagproduct::factory(15)))->create();
        $this->call([
            DepartmentSeeder::class
        ]);
    }
}
