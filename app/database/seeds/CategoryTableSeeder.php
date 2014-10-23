<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

		$faker = Faker::create();
        $categories = array(
            'Photoshop',
            'Illustrator',
            'Web',
            'Photography',
            'Copywriting',
            'Electronics',
            'Programming',
            'Modelling',
            'Accounting',
            'Logistics'
        );

        foreach($categories as $category)
        {
            Category::create([
                'name' => $category,
                'image_url' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
                'description' => $faker->paragraph,
            ]);
        }
	}

}