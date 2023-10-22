@extends('admin.sales_inventory_expenses.expenses.expenses')
@section('expenses')

    <div class="head-title">
        <div class="left">
            <h1>Edit Expenses</h1>
            <ul class="breadcrumb">
                <li>
                    <a class ="active"
                    href={{ route('inventoryIndex') }}>Expenses</a>
                </li>

                <li><i class='bx bx-chevron-right' ></i></li>

                <li>
                    <a class="active" href="#">Edit</a>
                </li>
            </ul>
        </div>

    </div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{-- Create announcement form --}}
    <div class="product-container">
        <h2>Expenses Information</h2>
        <form action="{{ route('expensesUpdate ',  ['product'=>$product]) }}" method="put" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="product-form-group">
                <label for="productName">Material:</label>
                <input type="text" id="productName" name="materials" value="{{ $product->materials }}" required>
            </div>

            <div class="product-form-group">
                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" value="{{ $product->weight }}" required>
            </div>
            <div class="product-form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="product-form-group">
                <button type="submit" class="announcement-btn">Submit</button>
            </div>
        </form>
    </div>

@endsection