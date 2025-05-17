@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<div class="float-start">
Add New Product
</div>
<div class="float-end">
<a href="{{ route('products.index') }}" class="btn
btn-primary btn-sm">&larr; Back</a>
</div>
</div>
<div class="card-body">
<form action="{{ route('products.store') }}"
method="post" enctype="multipart/form-data">
@csrf
<div class="mb-3 row">

<label for="code" class="col-md-4 col-form-
label text-md-end text-start">Code</label>

<div class="col-md-6">
<input type="text" class="form-control
@error('code') is-invalid @enderror" id="code" name="code" value="{{
old('code') }}">
@error('code')
<span class="text-danger">{{ $message
}}</span>
@enderror
</div>
</div>
<div class="mb-3 row">

<label for="name" class="col-md-4 col-form-
label text-md-end text-start">Name</label>

<div class="col-md-6">
<input type="text" class="form-control
@error('name') is-invalid @enderror" id="name" name="name" value="{{
old('name') }}">
@error('name')
<span class="text-danger">{{ $message
}}</span>
@enderror
</div>
</div>
<div class="mb-3 row">

<label for="quantity" class="col-md-4 col-
form-label text-md-end text-start">Quantity</label>

<div class="col-md-6">
<input type="number" class="form-control
@error('quantity') is-invalid @enderror" id="quantity" name="quantity"
value="{{ old('quantity') }}">
@error('quantity')
<span class="text-danger">{{ $message
}}</span>
@enderror
</div>
</div>
<div class="mb-3 row">

<label for="price" class="col-md-4 col-form-
label text-md-end text-start">Price</label>

<div class="col-md-6">
<input type="number" step="0.01"
class="form-control @error('price') is-invalid @enderror" id="price"
name="price" value="{{ old('price') }}">
@error('price')
<span class="text-danger">{{ $message
}}</span>
@enderror
</div>
</div>
<div class="mb-3 row">

<label for="description" class="col-md-4 col-
form-label text-md-end text-start">Description</label>

<div class="col-md-6">
<textarea class="form-control
@error('description') is-invalid @enderror" id="description"
name="description">{{ old('description') }}</textarea>
@error('description')
<span class="text-danger">{{ $message
}}</span>
@enderror
</div>
</div>

<div class="mb-3 row">
    <div class="col-md-6 offset-md-4 d-flex align-items-start gap-4">
        <div class="d-flex align-items-center gap-2">
            <input type="submit" class="btn btn-primary" value="Add Product">
            <label class="btn btn-outline-secondary mb-0">
                Upload Image <input type="file" name="image" id="image" accept="image/*" hidden onchange="previewImage(this)">
            </label>
        </div>
        <div id="imagePreview" style="display: none;">
            <img id="preview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px; object-fit: contain; border: 1px solid #ddd; border-radius: 4px;">
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        previewContainer.style.display = 'none';
    }
}
</script>
@endsection