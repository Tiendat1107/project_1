<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tbl_task';
    protected $fillable = [
        'project_id',
        'person_id',
        'start_time',
        'end_time',
        'priority',
        'name',
        'description',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'New';
            case 2:
                return 'In Progress';
            case 3:
                return 'Completed';
            case 4:
                return 'On Hold';
            default:
                return 'Unknown';
        }
    }

    public function getPriorityAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'High';
            case 2:
                return 'Medium';
            case 3:
                return 'Low';
            default:
                return 'Unknown';
        }
    }
}
