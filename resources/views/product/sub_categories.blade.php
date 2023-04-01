<div class="input-group mb-3">
    <select name="sub_category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="">Choose Sub Category</option>
        @foreach ($sub_categories as $sub_category)
            <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
        @endforeach
    </select>
</div>