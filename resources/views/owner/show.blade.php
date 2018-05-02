@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pet Owner - #{{ $owner->id }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('owners.edit', $owner->id) }}" method="GET">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="name" value="{{ $owner->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="living_structure" class="col-sm-4 col-form-label"><strong>Living In</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="living_structure" value="{{ ucwords($owner->living_structure) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lives_with_kids" class="col-sm-4 col-form-label"><strong>Living With Kids</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="lives_with_kids" value="{{ $owner->lives_with_kids ? 'Yes' : 'No' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><strong>Pets</strong></label>
                                <div class="col-sm-8">
                                    @forelse($owner->pets as $pet)
                                        <input type="text" readonly class="form-control-plaintext"
                                               value="{{ $pet->name }} ({{ $pet->kind }})">
                                    @empty
                                        <input type="text" readonly class="form-control-plaintext"
                                               value="This owner has no pets">
                                    @endforelse
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST">
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
