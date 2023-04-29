<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clients;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_number',
        'project_name',
        'client_id',
        'notes',
        'project_status',
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
