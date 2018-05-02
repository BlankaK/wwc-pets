@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pets</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Kind</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Vaccinated</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Vet</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pets as $pet)
                                <tr class="index-row clickable-row" data-target="/pets/{{ $pet->id }}">
                                    <th scope="row">{{ $pet->id }}</th>
                                    <td>{{ $pet->name }}</td>
                                    <td>{{ ucwords($pet->kind) }}</td>
                                    <td>{{ $pet->age }}</td>
                                    <td>{{ ucwords($pet->gender) }}</td>
                                    <td>{{ $pet->is_vaccinated ? 'Yes' : 'No' }}</td>
                                    <td>{{ optional($pet->owner)->name }}</td>
                                    <td>{{ optional($pet->vet)->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
