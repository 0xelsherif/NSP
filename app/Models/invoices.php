<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\leads;
use App\Models\projects;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'invoice_number', 
        'invoice_Date', 
        'collect_date', 
        'due_date', 
        'client_id', 
        'lead_id', 
        'service_id', 
        'project_id', 
        'price', 
        'vat', 
        'total', 
        'note'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function leadid(): BelongsTo
    {
        return $this->belongsTo(leads::class, 'lead_id');
    }
    public function project(): BelongsTo
    {
        return $this->belongsTo(projects::class, 'project_id');
    }

}
