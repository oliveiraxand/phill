<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cnpj', 'is_partner'];

    public function vehicles()
    {
        return this->hasMany(Vehicle::class);
    }
    
    public function persons()
    {
        return this->hasMany(Person::class);
    }
}
