<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
		for ($i=0; $i < 50; $i++) {
 			\DB::table('tasks')->insert([ 
               'task' => $faker->catchPhrase,
	           'description'  => $faker->sentence($nbWords = 6, $variableNbWords = true),
	           'done' => "0",
	           'created_at' => date('Y-m-d H:m:s'),
	           'updated_at' => date('Y-m-d H:m:s')
            ]);

    	}
    }
}
