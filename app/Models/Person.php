<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;


class Person extends Model
{
    protected $table = 'tbl_person';
    protected $fillable = [
        'full_name', 'gender', 'birthdate', 'phone_number', 'address', 'company_id',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'person_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
