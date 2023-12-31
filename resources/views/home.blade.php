@extends('layouts.admin')

@section('content')
    <div class="card-header">{{ __('Dashboard') }}</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}

        
        @livewire('user-find')
    </div>
@endsection
