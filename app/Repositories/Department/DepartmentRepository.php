<?php

namespace App\Repositories\Department;

use App\Models\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function getAll()
    {
        return Department::all();
    }

    public function getById($id)
    {
        return Department::findOrFail($id);
    }
    public function getAllDepartmentsSorted()
    {
        return Department::orderByRaw('CASE WHEN parent_id IS NULL THEN id ELSE parent_id END ASC, parent_id ASC, id ASC')->get();
    }

    public function create(array $data)
    {
        return Department::create($data);
    }

    public function update($id, array $data)
    {
        $department = Department::findOrFail($id);
        $department->update($data);
        return $department;
    }

    public function delete($id)
    {
        return Department::destroy($id);
    }
    
}
