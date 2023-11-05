@extends('layout')
@section('content')
<div class="col-sm-5">
        <div class="card mt-2 p-5">
        <form method="POST" action="/shoppingcart/create" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="usr">Product name:</label>
            <input type="text" class="form-control" name="product_name" value="{{old('product_name')}}">
            
        </div>
        <div class="form-group">
            <label for="usr">Product description:</label>
            <input type="text" class="form-control" name="product_description" value="{{old('product_description')}}">
        </div>
        <div class="form-group">
            <label for="usr">Product photo:</label>
            <input type="file" class="form-control" name="photo" value="{{old('photo')}}">
        </div>
        <div class="form-group">
            <label for="usr">Product price:</label>
            <input type="text" class="form-control" name="price" value="{{old('price')}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
    </div>
    @endsection