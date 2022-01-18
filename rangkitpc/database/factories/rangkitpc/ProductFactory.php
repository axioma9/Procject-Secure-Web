<?php

namespace Database\Factories\rangkitpc;

use App\Models\rangkitpc\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = array("gpu", "cpu", "mb", "ram", "stor", "psu", "case", "moni", "kb", "mos");
        $random_type=array_rand($type);
        return [
            'name' => $this->faker->sentence(mt_rand(3,6)),
            'type' => $type[$random_type],
            'stock' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(500000, 100000000),
            'description' => $this->faker->paragraph(mt_rand(2,5)),
        ];
    }
}
