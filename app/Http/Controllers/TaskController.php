<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\Person\PersonRepositoryInterface;
use App\Repositories\Projects\ProjectRepositoryInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TaskExport;
use App\Models\Task;


class TaskController extends Controller
{
    protected $personRepository;
    protected $taskRepository;
    protected $projectRepository;


    public function __construct(TaskRepositoryInterface $taskRepository, PersonRepositoryInterface $personRepository, ProjectRepositoryInterface $projectRepository)
    {
        $this->taskRepository = $taskRepository;

        $this->personRepository =$personRepository;

        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->getAll();
        return view('task.index', compact('tasks'));
    }
    public function get_person_in_task($projectId)
    {
        $people = $this->projectRepository->getPersons($projectId);
        return response()->json($people);
    }


    public function create()
    {
        $projects = $this->projectRepository->getAll();
        return view('task.create', compact('projects'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $this->taskRepository->create($data);
        return redirect()->route('task.index');
    }

    public function edit($id)
    {
        $projects = $this->projectRepository->getAll();
        $task = $this->taskRepository->getById($id);
    
        return view('task.edit', compact('projects', 'task'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->taskRepository->update($id, $data);
        return redirect()->route('task.index');
    }

    public function destroy($id)
    {
        $this->taskRepository->delete($id);
        return redirect()->route('task.index');
    }
    public function exportExcel()
    {
        return Excel::download(new TaskExport(), 'tasks.xlsx');
    }
    public function filterTasks(Request $request)
    {
    $query = Task::query();

    if ($request->has('project_id')) {
        $query->where('project_id', $request->project_id);
    }

    if ($request->has('person_id')) {
        $query->where('person_id', $request->person_id);
    }
    $tasks = $query->get();

    return view('task.index', compact('tasks'));
}

}
