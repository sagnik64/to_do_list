<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        
        $randomNum = rand(1,2);
        $gender = "";
        $firstName = "";
        if($randomNum == 1) {
            $gender = "Male";
            $firstName = $this->faker->firstNameMale();
        }
        else {
            $gender = "Female";
            $firstName = $this->faker->firstNameFemale();
        } 
        
        DB::table('users')->insert([
            'name' => $firstName . ' ' . $this->faker->lastName(),
            'email' => strtolower($firstName) . $this->faker->randomNumber(3) . '@example.com',
            'gender' => $gender,
            'password' => Hash::make($this->faker->password())
        ]);
    }
}
