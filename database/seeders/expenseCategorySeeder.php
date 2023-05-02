<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\expenseCategory;

class expenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id'                      => 1,
                'name'                   =>'Operating',
            ],
            [
                'id'                      => 2,
                'name'                   =>'Non-operating',  
            ],
            [
                'id'                      => 3,
                'name'                   =>'Fixed',
            ],
            [
                'id'                      => 4,
                'name'                   =>'Variable',
            ],
           
        ];

        expenseCategory::insert($categories);
    }
    
}
