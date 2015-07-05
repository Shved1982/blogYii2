<?php
return [
    'categories__id' => $faker->numberBetween($min = 1, $max = 50),
    'name' => $faker->sentence(3, true),
	'date_public' => $faker->date($format = 'Y-m-d', $max = 'now'),
	'short_text' => $faker->sentence(10, true),
	'full_text' => $faker->sentence(100, true),
    'is_active' => 1,
];