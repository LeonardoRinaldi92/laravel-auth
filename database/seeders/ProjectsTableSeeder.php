<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Project;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->word();
            $newProject->description = $faker->sentence(20);
            $newProject->short_description = $faker->sentence(5);
            $newProject->image = 'https://picsum.photos/200/300?random='.$i;
            $newProject->relase_date = $faker->dateTimeBetween('-20 week', '+20 week');
            $newProject->type = $faker->sentence(1);
            $newProject->save();
        }
    }
}
