<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PersonAndUserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;


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
});

Route::controller(RoleController::class)->group(function () {
    Route::get('/index/role', 'index')->name('role.index');
    Route::get('/create/role', 'create')->name('role.create');
    Route::get('/edit/role/{id}', 'edit')->name('role.edit');
    Route::post('/store/role', 'store')->name('role.store');
    Route::post('/update/role/{id}', 'update')->name('role.update');
    Route::get('/destroy/role/{id}', 'destroy')->name('role.destroy');
});