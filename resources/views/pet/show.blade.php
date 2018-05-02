@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pet - #{{ $pet->id }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('pets.edit', $pet->id) }}" method="GET">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="name" value="{{ $pet->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kind" class="col-sm-4 col-form-label"><strong>Kind of Pet</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="kind" value="{{ ucwords($pet->kind) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age" class="col-sm-4 col-form-label"><strong>Age</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="age" value="{{ $pet->age }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-form-label"><strong>Gender</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="gender" value="{{ ucwords($pet->gender) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_vaccinated" class="col-sm-4 col-form-label"><strong>Vaccinated</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="is_vaccinated" value="{{ $pet->is_vaccinated ? 'Yes' : 'No' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="owner_name" class="col-sm-4 col-form-label"><strong>Owner</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="owner_name" value="{{ optional($pet->owner)->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vet_name" class="col-sm-4 col-form-label"><strong>Vet</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="vet_name" value="{{ optional($pet->vet)->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
