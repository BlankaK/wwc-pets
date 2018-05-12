<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Pet;
use App\Vet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pet.index')->with('pets', Pet::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pet.create')
            ->with([
                'owners' => Owner::all(),
                'vets' => Vet::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'kind' => 'required|string|in:dog,cat,fish,snake,other mammal,other reptiles,other',
            'age' => 'required|integer',
            'gender' => 'required|string|in:male,female',
            'is_vaccinated' => 'required|boolean',
            'owner_id' => 'required|integer|exists:owners,id',
            'vet_id' => 'required|integer|exists:vets,id'
        ]);

        // Create new pet
        $pet = Pet::create($request->all());

        // Send message to view
        $request->session()->flash('status', 'New pet added - #' . $pet->id);

        // Redirect
        return redirect()->route('pets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return view('pet.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        return view('pet.edit')->with([
            'pet' => $pet,
            'owners' => Owner::all(),
            'vets' => Vet::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kind' => 'required|string|in:dog,cat,fish,snake,other mammal,other reptiles,other',
            'age' => 'required|integer',
            'gender' => 'required|string|in:male,female',
            'is_vaccinated' => 'required|boolean',
            'owner_id' => 'required|integer|exists:owners,id',
            'vet_id' => 'required|integer|exists:vets,id'
        ]);

        // Update pet details
        $pet->name = $request->input('name');
        $pet->kind = $request->input('kind');
        $pet->age = $request->input('age');
        $pet->gender = $request->input('gender');
        $pet->is_vaccinated = $request->input('is_vaccinated');
        $pet->owner_id = $request->input('owner_id');
        $pet->vet_id = $request->input('vet_id');
        $pet->save();

        // Send message to view
        $request->session()->flash('status', "Pet #{$pet->id} updated");

        // Redirect
        return redirect()->route('pets.show', $pet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
        request()->session()->flash('status', "Pet #{$pet->id} deleted");
        return redirect()->route('pets.index');
    }
}
