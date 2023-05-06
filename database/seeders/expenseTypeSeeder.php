<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\exType;

class expenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id'                                         => 1,
                'ex_categories_id'                      => 1,
                'name'                                       =>'Cost of Goods Sold (COGS)',
            ],
            [
                'id'                                         => 2,
                'ex_categories_id'                      => 1,
                'name'                                       =>'Marketing, advertising, and promotion',
            ],
            [
                'id'                                         => 3,
                'ex_categories_id'                      => 1,
                'name'                                       =>'Salaries, benefits, and wagesting',
            ],
            [
                'id'                                         => 4,
                'ex_categories_id'                      => 1,
                'name'                                       =>'Selling, general, and administrative (SG&A)',
            ],
            [
                'id'                                         => 5,
                'ex_categories_id'                      => 1,
                'name'                                       =>'Rent and insurance',
            ],
            [
                'id'                                         => 6,
                'ex_categories_id'                      => 1,
                'name'                                       =>'Depreciation and amortization',
            ],
            [
                'id'                                         => 7,
                'ex_categories_id'                      => 1,
                'name'                                       =>'Other',
            ],
            [
                'id'                                         => 8,
                'ex_categories_id'                      => 2,
                'name'                                       =>'Interest',
            ],
            [
                'id'                                         => 9,
                'ex_categories_id'                      => 2,
                'name'                                       =>'Taxes',
            ],
            [
                'id'                                         => 10,
                'ex_categories_id'                      => 2,
                'name'                                       =>'Impairment charges',
            ],
            [
                'id'                                         => 11,
                'ex_categories_id'                      => 3,
                'name'                                       =>'Rent',
            ],
            [
                'id'                                         => 12,
                'ex_categories_id'                      => 3,
                'name'                                       =>'Salaries, benefits, and wages',
            ],
            [
                'id'                                         => 13,
                'ex_categories_id'                      => 4,
                'name'                                       =>'Transaction fees',
            ],
            [
                'id'                                         => 14,
                'ex_categories_id'                      => 4,
                'name'                                       =>'Commissions',
            ],
            [
                'id'                                         => 15,
                'ex_categories_id'                      => 4,
                'name'                                       =>'Marketing and advertising',
            ],
           
        ];

        exType::insert($types);
    }
}
