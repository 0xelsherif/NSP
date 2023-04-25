<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clients;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class leads extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lead_number',
        'lead_name',
        'lead_phone',
        'lead_email',
        'lead_job',
        'client_id',
        'notes',
        'status',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
