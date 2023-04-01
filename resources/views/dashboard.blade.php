@extends('layouts.app')

@section('content')
    <div class="container-fluid p-4">
        <div class="text-center">
            <p>Welcome, <span class="text-success text-bold">{{ auth()->user()->name }}</span><br>
            </p>
        </div>        
    </div>    
@endsection
