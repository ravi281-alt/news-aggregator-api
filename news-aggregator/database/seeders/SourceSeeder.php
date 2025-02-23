<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Source;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            ['name' => 'BBC News', 'url' => 'https://www.bbc.com/news'],
            ['name' => 'The Guardian', 'url' => 'https://www.theguardian.com'],
            ['name' => 'New York Times', 'url' => 'https://www.nytimes.com']
        ];

        foreach ($sources as $source) {
            Source::create($source);
        }
    }
}
