<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'tbl_project';
    protected $primaryKey = 'id';

    protected $fillable = [
        'code', 'name', 'description', 'company_id',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function persons()
{
    return $this->belongsToMany(Person::class, 'tbl_person_project', 'project_id', 'person_id')->withTimestamps();
}

}
