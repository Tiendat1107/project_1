<?php

namespace App\Repositories\Company;

use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAll()
    {
        return Company::all();
    }

    public function getById($id)
    {
        return Company::findOrFail($id);
    }

    public function create(array $data)
    {
        return Company::create($data);
    }

    public function update($id, array $data)
    {
        $company = Company::findOrFail($id);
        $company->update($data);
        return $company;
    }

    public function delete($id)
    {
        return Company::destroy($id);
    }
}
