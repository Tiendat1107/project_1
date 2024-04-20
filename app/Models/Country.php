<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'tbl_country';
    protected $primaryKey = 'id';

    protected $fillable = [
        'code', 'name', 'description',
    ];
}
