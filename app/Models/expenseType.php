<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenseType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'expense_categories_id'
    ];
}
