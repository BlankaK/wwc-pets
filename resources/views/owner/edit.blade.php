@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Owner</div>

                    <div class="card-body">
                        <form action="{{ route('owners.update', $owner->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Owner name" value="{{ $owner->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="living_structure" class="col-sm-4 col-form-label"><strong>Living in</strong></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="living_structure" id="living_structure">
                                        <option value="house" @if($owner->living_structure == 'house') selected @endif>House</option>
                                        <option value="apartment" @if($owner->living_structure == 'apartment') selected @endif>Apartment</option>
                                        <option value="other" @if($owner->living_structure == 'other') selected @endif>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lives_with_kids" class="col-sm-4 col-form-label"><strong>Living with kids</strong></label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lives_with_kids" id="lives_with_kids_yes" value="1" @if($owner->lives_with_kids) checked @endif>
                                        <label class="form-check-label" for="lives_with_kids_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lives_with_kids" id="lives_with_kids_no" value="0" @if(!$owner->lives_with_kids) checked @endif>
                                        <label class="form-check-label" for="lives_with_kids_no">No</label>
                                    </div>
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
