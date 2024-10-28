<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadContact extends Model
{
    use HasFactory;
    protected $fillable = ['lead_id','phone'];

    protected $table = 'lead_contacts';
}
