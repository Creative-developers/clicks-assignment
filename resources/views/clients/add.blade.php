@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add Client</h1>

        @livewire('client.manage-client')
    </div>
@endsection
