<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Person\PersonRepositoryInterface;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;




class PersonAndUserController extends Controller
{
    protected $personRepository;
    protected $companyRepository;
    protected $roleRepository;

    public function __construct(PersonRepositoryInterface $personRepository, CompanyRepositoryInterface $companyRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->personRepository = $personRepository;
        $this->companyRepository = $companyRepository;
        $this->roleRepository = $roleRepository;

    }

    public function list()
    {
        $people = $this->personRepository->getAll();
        return view('person.index', compact('people'));
    }

    public function add()
    {
        $roles = $this->roleRepository->getAll();
        $companies = $this->companyRepository->getAll();
        return view('person.create', compact('companies','roles'));
    }
    public function edit_person($id)
    {
        $companies = $this->companyRepository->getAll();
        $person = $this->personRepository->getById($id); 
        $roles = $this->roleRepository->getAll();    
        return view('person.edit', compact('person', 'companies', 'roles'));
    }
    public function save(Request $request)
    {
        $data = $request->all();
        $data['company_id'] = $request->input('company_id');
        $this->personRepository->create($data);
        return redirect()->route('person.index');
    }
    public function update_person(Request $request, $id)
    {
        $data = $request->all();
        $data['company_id'] = $request->input('company_id');
        $this->personRepository->update($id, $data);
        return redirect()->route('person.index');
    }

    public function destroy_person($id)
    {
        $this->personRepository->delete($id);
        return redirect()->route('person.index');
    }
    public function user_role($id)
    {
        $user_role = $this->personRepository->getUserWithRoles($id);
        return view('person.user_role', compact('user_role'));
    }
}
