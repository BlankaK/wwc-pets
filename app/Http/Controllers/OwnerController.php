<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owner.index')->with('owners', Owner::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'living_structure' => 'required|string|in:house,apartment,other',
            'lives_with_kids' => 'required|boolean'
        ]);

        // Create new owner
        $owner = Owner::create($request->all());

        // Send message to view
        $request->session()->flash('status', 'New owner added - #' . $owner->id);

        // Redirect
        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('owner.show')->with('owner', $owner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit')->with('owner', $owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'living_structure' => 'required|string|in:house,apartment,other',
            'lives_with_kids' => 'required|boolean'
        ]);

        // Update owner details
        $owner->name = $request->input('name');
        $owner->living_structure = $request->input('living_structure');
        $owner->lives_with_kids = $request->input('lives_with_kids');
        $owner->save();

        // Send message to view
        $request->session()->flash('status', "Owner #{$owner->id} updated");

        // Redirect
        return redirect()->route('owners.show', $owner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        request()->session()->flash('status', "Owner #{$owner->id} deleted");
        return redirect()->route('owners.index');
    }
}
