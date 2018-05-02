@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pet Owners</div>

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
                                <th scope="col">Live In</th>
                                <th scope="col">Live with Kids</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr class="index-row clickable-row" data-target="/owners/{{ $owner->id }}">
                                    <th scope="row">{{ $owner->id }}</th>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ ucwords($owner->living_structure) }}</td>
                                    <td>{{ $owner->lives_with_kids ? 'Yes' : 'No' }}</td>
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
