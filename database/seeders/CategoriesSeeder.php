<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::truncate();

        $categories = [
            ['name' => 'Accounting/Finance'],
            ['name' => 'Admin/Human Resources'],
            ['name' => 'Arts/Media/Communications'],
            ['name' => 'Building/Construction'],
            ['name' => 'Banking'],
            ['name' => 'Computer/Information Technology'],
            ['name' => 'Education/Training'],
            ['name' => 'Engineering'],
            ['name' => 'Government'],
            ['name' => 'Healthcare'],
            ['name' => 'Hotel/Restaurant'],
            ['name' => 'Manufacturing'],
            ['name' => 'Sales/Marketing'],
            ['name' => 'Sciences'],
            ['name' => 'Services'],
            ['name' => 'Others'],
        ];
          
        foreach ($categories as $key => $value) {
            Categories::create($value);
        }
    }
}
