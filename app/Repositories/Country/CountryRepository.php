<?php

namespace App\Repositories\Country;

use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{
    public function getAll()
    {
        return Country::all();
    }

    public function getById($id)
    {
        return Country::findOrFail($id);
    }

    public function create(array $data)
    {
        return Country::create($data);
    }

    public function update($id, array $data)
    {
        $country = Country::findOrFail($id);
        $country->update($data);
        return $country;
    }

    public function delete($id)
    {
        return Country::destroy($id);
    }
}
