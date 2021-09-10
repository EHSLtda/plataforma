<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
	$freq_up = [
    	'903.9',
    	'904.1',
    	'904.3',
    	'904.5',
    	'904.7',
    	'904.9',
    	'905.1',
    	'905.3',
    	'904.6' 
	];


	$freq_down = [
	'923.3',
 	'923.9',
    	'924.5',
    	'925.1',
    	'925.7',
    	'926.3',
    	'926.9',
    	'927.5',
	'923.3'
	];
	return [
		    'id_device' => $this->faker->unique()->macAddress(),
        	'deveui' => $this->faker->unique()->macAddress(),
	        'appeui' => $this->faker->md5(),
        	'freq_region' => $this->faker->randomElement(array_merge($freq_up, $freq_down))
		];
    }
}
