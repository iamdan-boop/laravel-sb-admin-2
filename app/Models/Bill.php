<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'consumption',
        'billing_amount',
        'status'
    ];


    public function client() : BelongsTo {
        return $this->belongsTo(Client::class);
    }
}
