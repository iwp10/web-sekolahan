<?php

namespace App\Models;

use Database\Factories\SchoolProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    /** @use HasFactory<SchoolProfileFactory> */
    use HasFactory;

    protected $guarded = [];
}
