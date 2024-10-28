<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadBusinessInteligence extends Model
{
    use HasFactory;

    protected $fillable = ['title','quantity','lead_id'];

    protected $table = 'lead_businessinteligence';
}
