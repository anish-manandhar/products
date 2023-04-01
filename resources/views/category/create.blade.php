@extends('layouts.app')

@section('content')
    <div class="container-fluid p-3">
        <h3 class="text-black-50 text-center">Add new category</h3>
        <hr>
        <div class="row">
            <div class="col-sm-6 mx-auto mt-5">

                @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
    
            @endif

                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Category name"
                               class="form-control @error('name') is-invalid @enderror">
                    </div>

                    <div class="input-group mb-3">
                        <textarea name="description" id="" placeholder="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-success" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection