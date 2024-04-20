<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;


class User extends Model
{
    protected $table = 'tbl_user';
    protected $fillable = [
        'person_id', 'email', 'password', 'is_active',
    ];
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'tbl_user_role', 'user_id', 'role_id');
    }
    
}
