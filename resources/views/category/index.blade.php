@extends('layouts.app')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    {{-- status --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection

@section('content')
    <div class="container-fluid p-3">
        <h3 class="text-black-50 text-center">Category</h3>
        <hr>
        @if (session()->has('success'))
            <p class="alert alert-success text-center">{{ session()->get('success') }}</p>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-2">
            <a class="btn btn-success" href="{{ route('category.create') }}">Add category</a>
        </div>

        <div class="row">
            <div class="col-sm-10 mx-auto">
                <table class="table table-hover text-center" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($category as $data)
                            <tr>
                                <th scope="row">{{ $category->firstItem() + $loop->index }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description }}</td>
                                <td class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('category.edit', $data->id) }}" class="btn btn-primary"><i
                                        class="far fa-edit"></i></a>

                                    <a class="btn btn-warning" class="btn btn-warning" data-toggle="modal"
                                        data-target="#ModalShow{{ $data->id }}"><i class="far fa-eye"></i></a>  

                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                        data-target="#ModalDelete{{ $data->id }}"><i class="fas fa-trash"></i></a>
                                </td>

                                {{-- including delete modal --}} 
                                @include('modal.delete')

                                {{-- including show modal --}}
                                @include('modal.show')

                            </tr>
                        @empty
                            <tr>
                                <h5 class="text-center text-danger">No categories to show </h5>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-2">
                    {{ $category->links() }}
                </div>
            </div>
        </div>


    </div>
@endsection

@push('page_scripts')

    {{-- table with search --}}
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            var table = $('#myTable').DataTable();
        });

        $('#myTable').dataTable({
            "paging": false,
            "lengthChange": false,
            "info": false,
        });
    </script>
@endpush
