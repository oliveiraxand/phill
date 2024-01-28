<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $table = 'visits';
    protected $fillable = ['person_id', 'vehicle_id', 'arrival', 'input', 'output', 'enterprise_client_id', 'enterprise_partner_id', 'operation_id', 'nfs', 'comment'];

    //Create relationships

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
