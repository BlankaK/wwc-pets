<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Create all routes for default authentication behaviour
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Option 1 - define each route manually
    Route::get('owners', 'OwnerController@index')->name('owners.index');
    Route::post('owners', 'OwnerController@store')->name('owners.store');
    Route::get('owners/create', 'OwnerController@create')->name('owners.create');
    Route::delete('owners/{owner}', 'OwnerController@destroy')->name('owners.destroy');
    Route::put('owners/{owner}', 'OwnerController@update')->name('owners.update');
    Route::get('owners/{owner}', 'OwnerController@show')->name('owners.show');
    Route::get('owners/{owner}/edit', 'OwnerController@edit')->name('owners.edit');

    Route::get('vets', 'VetController@index')->name('vets.index');
    Route::post('vets', 'VetController@store')->name('vets.store');
    Route::get('vets/create', 'VetController@create')->name('vets.create');
    Route::delete('vets/{vet}', 'VetController@destroy')->name('vets.destroy');
    Route::put('vets/{vet}', 'VetController@update')->name('vets.update');
    Route::get('vets/{vet}', 'VetController@show')->name('vets.show');
    Route::get('vets/{vet}/edit', 'VetController@edit')->name('vets.edit');

    Route::get('pets', 'PetController@index')->name('pets.index');
    Route::post('pets', 'PetController@store')->name('pets.store');
    Route::get('pets/create', 'PetController@create')->name('pets.create');
    Route::delete('pets/{pet}', 'PetController@destroy')->name('pets.destroy');
    Route::put('pets/{pet}', 'PetController@update')->name('pets.update');
    Route::get('pets/{pet}', 'PetController@show')->name('pets.show');
    Route::get('pets/{pet}/edit', 'PetController@edit')->name('pets.edit');

    // Option 2 - define routes for each resource individually
    //Route::resource('owners', 'OwnerController');
    //Route::resource('vets', 'VetController');
    //Route::resource('pets', 'PetController');

    // Option 3 - define routes for multiple resources together
//    Route::resources([
//        'owners' => 'OwnerController',
//        'vets' => 'VetController',
//        'pets' => 'PetController',
//    ]);
});

