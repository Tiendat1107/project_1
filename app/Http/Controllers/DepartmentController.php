<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\Department\DepartmentRepositoryInterface;


class DepartmentController extends Controller
{
    protected $departmentRepository;
    protected $companyRepository;


    public function __construct(CompanyRepositoryInterface $companyRepository, DepartmentRepositoryInterface $departmentRepository)
    {
        $this->companyRepository = $companyRepository;

        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        $departments = $this->departmentRepository->getAllDepartmentsSorted();
        return view('department.index', compact('departments'));
    }

    public function create()
    {
        $companies = $this->companyRepository->getAll();
        $departments = $this->departmentRepository->getAll();
        return view('department.create', compact('departments', 'companies'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->departmentRepository->create($data);
        return redirect()->route('department.index');
    }

    public function edit($id)
    {
        $companies = $this->companyRepository->getAll();
        $departments = $this->departmentRepository->getAll();
        $department = $this->departmentRepository->getById($id);
    
        return view('department.edit', compact('department','companies', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->departmentRepository->update($id, $data);
        return redirect()->route('department.index');
    }

    public function destroy($id)
    {
        $this->departmentRepository->delete($id);
        return redirect()->route('department.index');
    }
}
