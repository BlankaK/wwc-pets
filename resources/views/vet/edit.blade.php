@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Vet</div>

                    <div class="card-body">
                        <form action="{{ route('vets.update', $vet->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Vet name" value="{{ $vet->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="years_practice" class="col-sm-4 col-form-label"><strong>Years Practice</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="years_practice" id="years_practice"
                                           placeholder="How long has this vet been practicing?" value="{{ $vet->years_practice }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
