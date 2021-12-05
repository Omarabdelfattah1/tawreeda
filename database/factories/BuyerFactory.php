<?php

namespace Database\Factories;

use App\Models\Buyer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BuyerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buyer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'company_name' => $this->faker->name() . '_company',
            'company_logo' => 'logos/8BRQj7so2NnXA67mMR68zpUY67QA4Xfj5PPtEA4H.png',
            'company_address' => $this->faker->address(),
            'company_type' =>'مستهلك نهائي'
        ];
    }
}
