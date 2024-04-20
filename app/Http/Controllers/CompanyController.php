<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Company\CompanyRepositoryInterface;


class CompanyController extends Controller
{
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $companies = $this->companyRepository->getAll();
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->companyRepository->create($data);
        return redirect()->route('company.index');
    }

    public function edit($id)
    {
        $company = $this->companyRepository->getById($id);
     
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->companyRepository->update($id, $data);
        return redirect()->route('company.index');
    }

    public function destroy($id)
    {
        $this->companyRepository->delete($id);
        return redirect()->route('company.index');
    }
}
