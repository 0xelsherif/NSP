<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\expenseType;

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
                'expense_categories_id'                      => 1,
                'name'                                       =>'Cost of Goods Sold (COGS)',
            ],
            [
                'id'                                         => 2,
                'expense_categories_id'                      => 1,
                'name'                                       =>'Marketing, advertising, and promotion',
            ],
            [
                'id'                                         => 3,
                'expense_categories_id'                      => 1,
                'name'                                       =>'Salaries, benefits, and wagesting',
            ],
            [
                'id'                                         => 4,
                'expense_categories_id'                      => 1,
                'name'                                       =>'Selling, general, and administrative (SG&A)',
            ],
            [
                'id'                                         => 5,
                'expense_categories_id'                      => 1,
                'name'                                       =>'Rent and insurance',
            ],
            [
                'id'                                         => 6,
                'expense_categories_id'                      => 1,
                'name'                                       =>'Depreciation and amortization',
            ],
            [
                'id'                                         => 7,
                'expense_categories_id'                      => 1,
                'name'                                       =>'Other',
            ],
            [
                'id'                                         => 8,
                'expense_categories_id'                      => 2,
                'name'                                       =>'Interest',
            ],
            [
                'id'                                         => 9,
                'expense_categories_id'                      => 2,
                'name'                                       =>'Taxes',
            ],
            [
                'id'                                         => 10,
                'expense_categories_id'                      => 2,
                'name'                                       =>'Impairment charges',
            ],
            [
                'id'                                         => 11,
                'expense_categories_id'                      => 3,
                'name'                                       =>'Rent',
            ],
            [
                'id'                                         => 12,
                'expense_categories_id'                      => 3,
                'name'                                       =>'Salaries, benefits, and wages',
            ],
            [
                'id'                                         => 13,
                'expense_categories_id'                      => 4,
                'name'                                       =>'Transaction fees',
            ],
            [
                'id'                                         => 14,
                'expense_categories_id'                      => 4,
                'name'                                       =>'Commissions',
            ],
            [
                'id'                                         => 15,
                'expense_categories_id'                      => 4,
                'name'                                       =>'Marketing and advertising',
            ],
           
        ];

        expenseType::insert($types);
    }
}
