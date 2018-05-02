@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Pet</div>

                    <div class="card-body">
                        <form action="{{ route('pets.update', $pet->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"><strong>Name</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Owner name" value="{{ $pet->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kind" class="col-sm-4 col-form-label"><strong>Kind of Pet</strong></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="kind" id="kind">
                                        <option value="dog" @if($pet->kind == 'dog') selected @endif>Dog</option>
                                        <option value="cat" @if($pet->kind == 'cat') selected @endif>Cat</option>
                                        <option value="fish" @if($pet->kind == 'fish') selected @endif>Fish</option>
                                        <option value="snake" @if($pet->kind == 'snake') selected @endif>Snake</option>
                                        <option value="other mammal" @if($pet->kind == 'other mammal') selected @endif>Other mammal</option>
                                        <option value="other reptiles" @if($pet->kind == 'other reptiles') selected @endif>Other reptiles</option>
                                        <option value="other" @if($pet->kind == 'other') selected @endif>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age" class="col-sm-4 col-form-label"><strong>Age</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="age" id="age"
                                           placeholder="Age of pet" value="{{ $pet->age }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-form-label"><strong>Gender</strong></label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" @if($pet->gender == 'male') checked @endif>
                                        <label class="form-check-label" for="gender_male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female" @if($pet->gender == 'female') checked @endif>
                                        <label class="form-check-label" for="gender_female">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="is_vaccinated" class="col-sm-4 col-form-label"><strong>Vaccinated</strong></label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_vaccinated" id="is_vaccinated_yes" value="1" @if($pet->is_vaccinated) checked @endif>
                                        <label class="form-check-label" for="is_vaccinated_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_vaccinated" id="is_vaccinated_no" value="0" @if(!$pet->is_vaccinated) checked @endif>
                                        <label class="form-check-label" for="is_vaccinated_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="owner" class="col-sm-4 col-form-label"><strong>Owner</strong></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="owner_id" id="owner">
                                        @foreach($owners as $owner)
                                            <option value="{{ $owner->id }}" @if($owner->id == $pet->owner_id) selected @endif>{{ $owner->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vet" class="col-sm-4 col-form-label"><strong>Vet</strong></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="vet_id" id="vet">
                                        @foreach($vets as $vet)
                                            <option value="{{ $vet->id }}" @if($vet->id == $pet->vet_id) selected @endif>{{ $vet->name }}</option>
                                        @endforeach
                                    </select>
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
