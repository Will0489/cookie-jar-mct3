<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

        $faker = Faker::create();
        $adminPass = 'cookiejar';

        $user = User::create(array(
            'first_name' => 'William',
            'last_name' => 'Blommaert',
            'email' => 'william.blommaert@student.kdg.be',
            'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
            'password' => $adminPass
        ));

        $user = User::create(array(
            'first_name' => 'Ksenia',
            'last_name' => 'Karelskaya',
            'email' => 'ksenia.karelskaya@student.kdg.be',
            'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
            'password' => $adminPass
        ));

		foreach(range(1, 48) as $index)
		{
			User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
                'password' => $faker->word
			]);
		}
	}

}