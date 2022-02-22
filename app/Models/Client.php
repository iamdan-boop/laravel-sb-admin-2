<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'middle_initial',
        'last_name',
        'email',
        'contact_number',
        'type',
        'route',
        'status',
        'meter_number',
        'stub_number'
    ];


    public function bills() : HasMany {
        return $this->hasMany(Bill::class);
    }
}
