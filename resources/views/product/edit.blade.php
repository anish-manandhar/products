@extends('layouts.app')

@section('content')
    <div class="container-fluid p-3">
        <h3 class="text-black-50 text-center">Edit category</h3>
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

                <form action="{{ route('product.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="artileInput">Edit Product's Category</label>
                    <div class="input-group mb-3">
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="{{ $data->category_id }}">{{ $data->category->name }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="artileInput">Edit Product's SubCategory</label>
                    <div id="sub_category">
                    <div class="input-group mb-3">
                        <select name="sub_category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="{{ $data->sub_category_id }}">{{ $data->subcategory->name }}</option>
                        </select>
                    </div>
                    </div>
                    <label for="artileInput">Edit Product Name</label>
                    <div class="input-group mb-3">
                        <input type="text"
                               name="name"
                               value="{{ $data->name }}"
                               placeholder="Product name"
                               class="form-control @error('name') is-invalid @enderror">
                    </div>
                    <label for="artileInput">Edit Product Description</label>
                    <div class="input-group mb-3">                       
                        <textarea name="description" id="" placeholder="Description" class="form-control @error('description') is-invalid @enderror">{{ $data->description }}</textarea>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        (function($) {
        $(document).ready(function() {
            $('#category_id').change(function() {
                var category_id = $('#category_id').val();
                var url = "{{ route('get_subcategories') }}";
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: url,
                    cache: false,
                    data:{
                        _token: "{{ csrf_token() }}",
                        category_id: category_id,
                    },
                    beforeSend: function() {
                        $("#sub_category").empty();
                    },
                    success: function(response) {
                        $("#sub_category").empty().html(response);
                    },
                    error: function(){
                        alert('Please Choose Category');
                    }
                    });
            });
        });
    })(jQuery);
    </script>

@endsection