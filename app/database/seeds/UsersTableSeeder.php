<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

        $faker = Faker::create();
        $adminPass = Hash::make('cookiejar');

        $user = User::create(array(
            'email' => 'william.blommaert@student.kdg.be',
            'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
            'username' => 'William',
            'password' => 'cookiejar'
        ));

        $user = User::create(array(
            'email' => 'ksenia.karelskaya@student.kdg.be',
            'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
            'username' => 'Ksenia',
            'password' => 'cookiejar'
        ));

		foreach(range(1, 48) as $index)
		{
			User::create([
                'email' => $faker->email,
                'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
                'username' => $faker->userName,
                'password' => $faker->word
			]);
		}
	}

}