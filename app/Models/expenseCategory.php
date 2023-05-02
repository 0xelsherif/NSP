<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\expenseCategory;

class expenseCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function expenseType(){
        return $this->hasMany(expenseCategory::class, 'expense_categories_id');
    }
}
