<?php

namespace App\Repositories\Company;

interface CompanyRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
    public function depart_company($id);
    public function getPersons($id);
}
