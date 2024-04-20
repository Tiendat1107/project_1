<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Role\PersonRepositoryInterface;



class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->getAll();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->roleRepository->create($data);
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->getById($id);
     
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->roleRepository->update($id, $data);
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $this->roleRepository->delete($id);
        return redirect()->route('role.index');
    }
}
