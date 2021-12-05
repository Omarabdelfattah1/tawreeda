<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {

        $state = config('states')[array_rand(config('states'))];

        return [
            'company_name' => $this->faker->name() . '_company',
            'state' => $state,
            'employees_number' => rand(2,1000),
            'company_logo' => 'logos/8BRQj7so2NnXA67mMR68zpUY67QA4Xfj5PPtEA4H.png',
            'company_CRN' => 147852369,
            'company_TXCard' => 147852369,
            'company_address' => $this->faker->address(),
            'about' => $this->faker->paragraph(),
            'quality' => $this->faker->paragraph(),
            'production' => $this->faker->paragraph(),
            'email' => $this->faker->unique()->safeEmail(),
            'team_photo' => 'teams/AF0kWCQMS5Lp9ebaugEQSyLA6d6ItshHLRmOtN4k.jpg',
            'team_description' => 'الانتاج: 6 اشخاص المبيعات: 3 اشخاص الادارة: 5 اشخاص'
        ];

    }
}
