<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\Person\PersonRepositoryInterface;
use App\Repositories\Projects\ProjectRepositoryInterface;



class ProjectController extends Controller
{
    protected $personRepository;
    protected $companyRepository;
    protected $projectRepository;


    public function __construct(CompanyRepositoryInterface $companyRepository, PersonRepositoryInterface $personRepository, ProjectRepositoryInterface $projectRepository)
    {
        $this->companyRepository = $companyRepository;

        $this->personRepository =$personRepository;

        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $projects = $this->projectRepository->getAll();
        return view('project.index', compact('projects'));
    }
    public function get_person($companyId)
    {
        $people = $this->companyRepository->getPersons($companyId);
        return response()->json($people);
    }


    public function create()
    {
        $companies = $this->companyRepository->getAll();
        return view('project.create', compact('companies'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $this->projectRepository->create($data);
        return redirect()->route('project.index');
    }

    public function edit($id)
    {
        $companies = $this->companyRepository->getAll();
        $project = $this->projectRepository->getById($id);
    
        return view('project.edit', compact('companies', 'project'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->projectRepository->update($id, $data);
        return redirect()->route('project.index');
    }

    public function destroy($id)
    {
        $this->projectRepository->delete($id);
        return redirect()->route('project.index');
    }
}
