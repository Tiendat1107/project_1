<?php

namespace App\Repositories\Person;

use App\Models\Person;
use App\Models\User;
use App\Models\Role;
use App\Repositories\Person\PersonRepositoryInterface;


class PersonRepository implements PersonRepositoryInterface
{
    public function getAll()
    {
        return Person::with('user', 'company',)->get();
    }

    public function getById($id)
    {
        return Person::with('user', 'company')->findOrFail($id);
    }

    public function create(array $data)
    { 
        $person = Person::create($data); 
        $user = new User($data); 
        $person->user()->save($user);
        if (isset($data['value'])) {
            $user->roles()->sync($data['value']);
        }
        return $person;
    }
    

    public function update($id, array $data)
    {        
        $person = Person::with('user','company')->findOrFail($id);
        $person->update($data);
        $user = $person->user;
        if ($user) {
            $user->update($data);
        
            if (isset($data['value'])) {
                $user->roles()->sync($data['value']);
            }
        }
        return $person;
    }

    public function delete($id)
    {
        $person = Person::with('user')->findOrFail($id);
        if ($person->user) {
            $person->user->roles()->detach();
            $person->user()->delete();
        }
        $person->delete();
        return $person;
    }
    public function getUserWithRoles($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->roles;
        return [
            'user' => $user,
            'roles' => $roles,
        ];
    }
}
