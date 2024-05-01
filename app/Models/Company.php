<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'tbl_company';
    protected $primaryKey = 'id';

    protected $fillable = [
        'code', 'name', 'address',
    ];
    public function departments()
    {
        return $this->hasMany(Department::class, 'company_id', 'id');
    }
}
