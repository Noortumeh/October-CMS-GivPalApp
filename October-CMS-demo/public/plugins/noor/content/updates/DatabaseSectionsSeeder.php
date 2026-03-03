<?php
namespace Noor\Content\Updates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Noor\Content\Updates\Seeders\{MediaSeeder, NewsSeeder, ProjectsSeeder, ServiceSeeder, StatisticsSeeder};
use October\Rain\Database\Updates\Seeder;

class DatabaseSectionsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            NewsSeeder::class,
            MediaSeeder::class,
            ProjectsSeeder::class,
            ServiceSeeder::class,
            StatisticsSeeder::class,
        ]);
    }
}
