<?php
 
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
 
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,20) as $index) {
        DB::table('users')->insert([
            'name' => $faker->name,
            'p_address'=>$faker->username,
            'email'=>$faker->unique()->email,
            'district_involved'=>$faker->username,
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
            'dob' => $faker->dateTime(),
           
        ]);
      }
    }
}