<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class AuthorPublisherBookSeeder extends Seeder
{
     public function run()
    {
        Author::factory(100)->create()->each(function ($author) {
            $publisher = Publisher::factory()->create();
            $author->books()->createMany(
                Book::factory(10)->make([
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'publisher_id' => $publisher->id,
                    'published_year' => rand(1900,2024),
                ])->toArray()
            );
        });
    }

}
