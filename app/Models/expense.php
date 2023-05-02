<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\expenseCategory;
use App\Models\expenseType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'entry_date', 
        'amount',
        'description',  
        'expense_categories_id',
        'expense_types_id',
        'status',
    ];

    public function expenseCategory(): BelongsTo
    {
        return $this->belongsTo(expenseCategory::class, 'expense_categories_id');
    }
    public function expenseType(): BelongsTo
    {
        return $this->belongsTo(expenseType::class, 'expense_types_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
