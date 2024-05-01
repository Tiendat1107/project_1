<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Models\Person;


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

    public function depart_company($id){
        $company = Company::findOrFail($id);
        $department= $company->departments;
        return[
            'company'=> $company,
            'department'=> $department
        ];
    }
    public function getPersons($id)
    {
        $persons = Person::where('company_id', $id)->get();
        return $persons;
    }
}
