<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['business_name'];

    protected $table = 'leads';

    public function lead_contacts() {
        return $this->hasMany(LeadContact::class, 'lead_id');
    }

    public function lead_businessinteligence() {
        return $this->hasMany(LeadBusinessInteligence::class, 'lead_id');
    }
}
