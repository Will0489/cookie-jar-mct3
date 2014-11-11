<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

        $faker = Faker::create();

        $category = Category::create(array(
            'name' => 'photoshop',
            'image_url' => 'assets/images/photoshop.gif',
            'description' => $faker->paragraph,
            ));
        $category = Category::create(array(
            'name' => 'web',
            'image_url' => 'assets/images/web.gif',
            'description' => $faker->paragraph,
            ));
        $category = Category::create(array(
            'name' => 'photography',
            'image_url' => 'assets/images/photography.gif',
            'description' => $faker->paragraph,
            ));
        $category = Category::create(array(
            'name' => 'copywriting',
            'image_url' => 'assets/images/copywriting.gif',
            'description' => $faker->paragraph,
            ));
        $category = Category::create(array(
            'name' => 'programming',
            'image_url' => 'assets/images/programming.gif',
            'description' => $faker->paragraph,
            ));
        $category = Category::create(array(
            'name' => 'model',
            'image_url' => 'assets/images/model.gif',
            'description' => $faker->paragraph,
            ));

        $category = Category::create(array(
            'name' => 'fashion',
            'image_url' => 'assets/images/fashion.gif',
            'description' => $faker->paragraph,
            ));
        $category = Category::create(array(
            'name' => 'illustration',
            'image_url' => 'assets/images/illustration.gif',
            'description' => $faker->paragraph,
            ));
        
    }

}