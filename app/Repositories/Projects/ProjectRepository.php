<?php

namespace App\Repositories\Projects;

use App\Models\Project;
use App\Models\Person;


class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAll()
    {
        return Project::with('company',)->get();

    }

    public function getById($id)
    {
        return Project::with('persons')->findOrFail($id);
    }

    public function create(array $data)
    {
        $project = Project::create($data);
        if (isset($data['person_id'])) {
            $project->persons()->sync($data['person_id']);
        }
        return $project;
    }
    
    public function update($id, array $data)
    {
        $project = Project::findOrFail($id);
        $project->update($data);
        if (isset($data['person_id'])) {
            $project->persons()->sync($data['person_id']);
        }
        return $project;
    }

    public function delete($id)
    {
        return Project::destroy($id);
    }

    public function getPersons($id)
    {
        $people = Project::findOrFail($id)->persons;
        return $people;
    }
}
