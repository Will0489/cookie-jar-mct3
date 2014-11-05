<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');
        $this->call('CategoryTableSeeder');
        $this->command->info('Categories table seeded!');
	}

}
