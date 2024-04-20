<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Country\CountryRepositoryInterface;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    protected $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        $countries = $this->countryRepository->getAll();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryRequest $request)
    {
        $data = $request->validated();
        $this->countryRepository->create($data);
        return redirect()->route('countries.index');
    }

    public function edit($id)
    {
        $country = $this->countryRepository->getById($id);
     
        return view('countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
        $data = $request->validated();
        $this->countryRepository->update($id, $data);
        return redirect()->route('countries.index');
    }

    public function destroy($id)
    {
        $this->countryRepository->delete($id);
        return redirect()->route('countries.index');
    }
}
