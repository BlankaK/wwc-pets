<?php

namespace App\Http\Controllers;

use App\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vet.index')->with('vets', Vet::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vet.create');
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
            'years_practice' => 'required|integer'
        ]);

        // Create new vet
        $vet = Vet::create($request->all());

        // Send message to view
        $request->session()->flash('status', 'New vet added - #' . $vet->id);

        // Redirect
        return redirect()->route('vets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function show(Vet $vet)
    {
        return view('vet.show')->with('vet', $vet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function edit(Vet $vet)
    {
        return view('vet.edit')->with('vet', $vet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vet $vet)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'years_practice' => 'required|integer'
        ]);

        // Update vet details
        $vet->name = $request->input('name');
        $vet->years_practice = $request->input('years_practice');
        $vet->save();

        // Send message to view
        $request->session()->flash('status', "Vet #{$vet->id} updated");

        // Redirect
        return redirect()->route('vets.show', $vet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vet  $vet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vet $vet)
    {
        $vet->delete();
        request()->session()->flash('status', "Vet #{$vet->id} deleted");
        return redirect()->route('vets.index');
    }
}
