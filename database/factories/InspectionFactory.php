<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inspection;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inspection>
 */
class InspectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Inspection::class;

    public function definition()
    {
        return [
            'patient_id' => function () {
                // Assuming you have a Patient model
                return Patient::factory()->create()->id;
            },
            'td' => $this->faker->randomFloat(2, 70, 180),
            'suhu' => $this->faker->randomFloat(2, 35, 40),
            'nadi' => $this->faker->numberBetween(60, 100),
            'so2' => $this->faker->numberBetween(90, 100),
            'pernafasan' => $this->faker->numberBetween(12, 20),
            'deha' => $this->faker->randomFloat(2, 34, 40),
            'tb' => $this->faker->numberBetween(150, 200),
            'bb' => $this->faker->numberBetween(40, 120),
            'subjektif' => $this->faker->sentence,
            'objektif' => $this->faker->sentence,
            'assesment' => $this->faker->sentence,
            'plan' => $this->faker->sentence,
            'diagnosa' => 'demam',
            'tindakan' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
