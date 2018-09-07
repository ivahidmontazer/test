@extends('layouts.master')
@section('content')
<div class="card">
    <h3 class="card-header">
        Edit product
    </h3>
    <form id="update" action="{{ url('/api/products/'. $product['time']) }}" method="POST" class="card-body">
        <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <input type="text" value="{{ $product['name'] }}" name="name" maxlength="25" required placeholder="name" class="form-control">
        </div>
        <div class="form-group">
            <input type="number" required value="{{ $product['quantity'] }}" min="1" placeholder="quantity in stock" name="quantity" class="form-control">
        </div>
        <div class="form-group">
            <input type="number" value="{{ $product['price'] }}" required placeholder="price" class="form-control" name="price" min="1">
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
</div>
@endsection