<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $CategoryId = DB::table('categories')->pluck('id');
        return [
            //
            'Judul' => $this->faker->name(),
            'Penulis' => $this->faker->name(),
            'PublishDate' => now(),
            'Stock' => $this->faker->numberBetween(10, 200),
            'image' => 'harry potter 2_J.K. Rowling.png',
            'category_id' => $this->faker->randomElement($CategoryId)

        ];
    }
}
