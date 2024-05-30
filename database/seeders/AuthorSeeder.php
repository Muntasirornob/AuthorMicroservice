<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define how many authors you want to create
        $numberOfAuthors = 10;

        // Use the Author factory to create authors
        Author::factory()->count($numberOfAuthors)->create();
    }
}
