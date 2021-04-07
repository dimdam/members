<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber(10),
            'paid_membership' => $this->faker->boolean(false),
            'is_a_scrutineer_candidate' =>$this->faker->boolean(false),
            'is_a_candidate' =>$this->faker->boolean(false),
            'updated_at' => $this->faker->unique()->dateTimeBetween('-15 years', 'now')

        ];
    }
}
