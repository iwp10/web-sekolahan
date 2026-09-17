<?php

namespace App\Models;

use Database\Factories\ExtracurricularFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    /** @use HasFactory<ExtracurricularFactory> */
    use HasFactory;

    protected $guarded = [];
}
