<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++) { 
            $catalog = new Book();

            $catalog->isbn = $faker->randomNumber(9);
            $catalog->title = $faker->name;
            $catalog->year = rand(2010, 2022);

            $catalog->publisher_id = rand(1,20);
            $catalog->author_id = rand(1,20);
            $catalog->catalog_id = rand(1,3);

            $catalog->qty = rand(1,100);
            $catalog->price = rand(10000,100000);

            $catalog->save();
        }
    }
}
