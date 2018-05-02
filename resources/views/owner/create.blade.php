@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Owner</div>

                    <div class="card-body">
                        <form action="{{ route('owners.store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Owner name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="living_structure" class="col-sm-4 col-form-label"><strong>Living in</strong></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="living_structure" id="living_structure">
                                        <option value="house">House</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lives_with_kids" class="col-sm-4 col-form-label"><strong>Living with kids</strong></label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lives_with_kids" id="lives_with_kids_yes" value="1" checked>
                                        <label class="form-check-label" for="lives_with_kids_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lives_with_kids" id="lives_with_kids_no" value="0">
                                        <label class="form-check-label" for="lives_with_kids_no">No</label>
                                    </div>
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
