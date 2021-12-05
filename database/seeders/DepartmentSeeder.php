<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = \App\Models\Supplier::all();
        foreach($suppliers as $supplier){
            $buyers = \App\Models\Supplier::all()->random(rand(1,15));
            $department = \App\Models\Department::find(rand(1,2));
            $categories = $department->categories()->get('id')->random(5);

            foreach($buyers as $buyer){
                \App\Models\Review::create([
                    'buyer_id' => $buyer->id,
                    'supplier_id' => $supplier->id,
                    'stars' => rand(1,5),
                    'title' => Str::random(10),
                    'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium perspiciatis verita'
                ]);
            }
            $supplier->departments()->sync($department->id);
            $supplier->categories()->sync($categories);

        }
    }
}
