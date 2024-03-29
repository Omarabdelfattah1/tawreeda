<?php

namespace Database\Factories;

use App\Models\Tagproduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagproductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tagproduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(5)
        ];
    }
}
