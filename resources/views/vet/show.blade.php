@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vet - #{{ $vet->id }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('vets.edit', $vet->id) }}" method="GET">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="name" value="{{ $vet->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="years_practice" class="col-sm-4 col-form-label"><strong>Years Practice</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext"
                                           id="years_practice" value="{{ $vet->years_practice }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><strong>Pets</strong></label>
                                <div class="col-sm-8">
                                    @forelse($vet->pets as $pet)
                                        <input type="text" readonly class="form-control-plaintext"
                                               value="{{ $pet->name }} ({{ $pet->kind }})">
                                    @empty
                                        <input type="text" readonly class="form-control-plaintext"
                                               value="This vet does not take care of any pets">
                                    @endforelse
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('vets.destroy', $vet->id) }}" method="POST">
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
