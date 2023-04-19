<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Country;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_number',
        'client_name',
        'country_id',
        'categories_id',
        'notes',
        'status',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
