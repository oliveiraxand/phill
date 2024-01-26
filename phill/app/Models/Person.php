<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cpf', 'birth', 'enterprise_id'];
    protected $table = 'persons';

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
