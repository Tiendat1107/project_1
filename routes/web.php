<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PersonAndUserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;




Route::controller(CountryController::class)->group(function () {
    Route::get('/index', 'index')->name('countries.index');
    Route::get('/create', 'create')->name('countries.create');
    Route::get('/edit/{id}', 'edit')->name('countries.edit');
    Route::post('/store', 'store')->name('countries.store');
    Route::post('/update/{id}', 'update')->name('countries.update');
    Route::get('/destroy/{id}', 'destroy')->name('countries.destroy');
});

Route::controller(PersonAndUserController::class)->group(function () {
    Route::get('/list', 'list')->name('person.index');
    Route::get('/add', 'add')->name('person.create');
    Route::get('/edit-person/{id}', 'edit_person')->name('person.edit');
    Route::post('/save', 'save')->name('person.store');
    Route::post('/update-person/{id}', 'update_person')->name('person.update');
    Route::get('/destroy-person/{id}', 'destroy_person')->name('person.destroy');
    Route::get('/user-role/{id}', 'user_role')->name('user.role');

});

Route::controller(CompanyController::class)->group(function () {
    Route::get('/index/compay', 'index')->name('company.index');
    Route::get('/create/company', 'create')->name('company.create');
    Route::get('/edit/company/{id}', 'edit')->name('company.edit');
    Route::post('/store/company', 'store')->name('company.store');
    Route::post('/update/company/{id}', 'update')->name('company.update');
    Route::get('/destroy/company/{id}', 'destroy')->name('company.destroy');
    Route::get('/depart-company/{id}', 'depart_company')->name('depart_company');
});

Route::controller(RoleController::class)->group(function () {
    Route::get('/index/role', 'index')->name('role.index');
    Route::get('/create/role', 'create')->name('role.create');
    Route::get('/edit/role/{id}', 'edit')->name('role.edit');
    Route::post('/store/role', 'store')->name('role.store');
    Route::post('/update/role/{id}', 'update')->name('role.update');
    Route::get('/destroy/role/{id}', 'destroy')->name('role.destroy');
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('/department/index', 'index')->name('department.index');
    Route::get('/department/create', 'create')->name('department.create');
    Route::get('/department/edit/{id}', 'edit')->name('department.edit');
    Route::post('/department/store', 'store')->name('department.store');
    Route::post('/department/update/{id}', 'update')->name('department.update');
    Route::get('/department/destroy/{id}', 'destroy')->name('department.destroy');
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('/project/index', 'index')->name('project.index');
    Route::get('/project/create', 'create')->name('project.create');
    Route::get('/project/edit/{id}', 'edit')->name('project.edit');
    Route::post('/project/store', 'store')->name('project.store');
    Route::post('/project/update/{id}', 'update')->name('project.update');
    Route::get('/project/destroy/{id}', 'destroy')->name('project.destroy');
    Route::get('/get-person/{companyId}', 'get_person')->name('get_person');

});

Route::controller(TaskController::class)->group(function () {
    Route::get('/task/index', 'index')->name('task.index');
    Route::get('/task/create', 'create')->name('task.create');
    Route::get('/task/edit/{id}', 'edit')->name('task.edit');
    Route::post('/task/store', 'store')->name('task.store');
    Route::post('/task/update/{id}', 'update')->name('task.update');
    Route::get('/task/destroy/{id}', 'destroy')->name('task.destroy');
    Route::get('/get-person-in-task/{projectId}', 'get_person_in_task');
    Route::get('/export-excel', 'exportExcel')->name('export.excel');
    Route::get('/filter-tasks', 'filterTasks')->name('task.filter');

});