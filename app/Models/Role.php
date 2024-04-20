<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'tbl_role';
    protected $fillable = [
        'role', '', 'description', 
    ];
 
  public function user()
  {
      return $this->belongsToMany(User::class, 'tbl_user_role');
  }
}
