@extends('crud::layouts.app')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        @forelse($records as $key => $record)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $record->name }}</td>
            <td>{{ $record->email }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No records found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection