<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class InstitutionsTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

		$faker = Faker::create();
        $names = array(
            'Karel de Grote Hogeschool',
            'Universiteit Antwerpen',
            'Katholieke Universiteit Leuven',
            'Vrije Universiteit Brussel',
            'Universiteit Gent',
            'Hogeschool West-Vlaanderen',
            'Artesis',
            'Lessius',
            'Hogeschool Gent',
            'Katholieke Hogeschool Limburg'
        );

        $i = 1;
		foreach($names as $name)
		{
			Institution::create([
                'name' => $name,
                'description' => $faker->paragraph,
                'city' => $faker->city,
                'country' => 'Belgium'
			]);
		}
	}

}