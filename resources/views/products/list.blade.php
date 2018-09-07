@extends('layouts.master')
@section('content')
    <div class="card">
        <h3 class="card-header">
            Create product
        </h3>
        <form id="create" action="{{ url('api/products') }}" method="POST" class="card-body">
            <br>
            <div class="form-group">
                <input type="text" name="name" maxlength="25" required placeholder="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" required min="1" placeholder="Quantity in stock" name="quantity" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" required placeholder="price" class="form-control" name="price" min="1">
            </div>
            <button class="btn btn-primary">
                Create
            </button>
        </form>
        <br>
        <br>
        <h3>
            Products list:
        </h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>
                    name
                </th>
                <th>
                    quantity
                </th>
                <th>
                    price
                </th>
                <th>
                    time
                </th>
                <th>
                    total value number
                </th>
                <th>
                    edit
                </th>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{ $product['name'] }}
                        </td>
                        <td>
                            {{ $product['quantity'] }}
                        </td>
                        <td>
                            {{ $product['price'] }}
                        </td>
                        <td>
                            {{ date('Y-m-d h:m:s', $product['time']) }}
                        </td>
                        <td>
                            @php
                                $total = $total + ($product['price'] * $product['quantity']);
                            @endphp
                            {{ $product['price'] * $product['quantity'] }}
                        </td>
                        <td>
                            <a href="{{ url('products/' . $product['time'] . '/edit') }}">
                                edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        Total Value:
                    </td>
                    <td>
                        {{ $total }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection