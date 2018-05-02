@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Vet</div>

                    <div class="card-body">
                        <form action="{{ route('vets.store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Vet name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="years_practice" class="col-sm-4 col-form-label"><strong>Years Practice</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="years_practice" id="years_practice"
                                           placeholder="How long has this vet been practicing?" value="{{ old('years_practice') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
