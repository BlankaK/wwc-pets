@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vets</div>

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
                                <th scope="col">Years Practice</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vets as $vet)
                                <tr class="index-row clickable-row" data-target="/vets/{{ $vet->id }}">
                                    <th scope="row">{{ $vet->id }}</th>
                                    <td>{{ $vet->name }}</td>
                                    <td>{{ $vet->years_practice }}</td>
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
