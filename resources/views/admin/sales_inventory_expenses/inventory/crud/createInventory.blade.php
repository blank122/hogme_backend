@extends('admin.sales_inventory_expenses.inventory.inventory')
@section('inventory')

    <div class="head-title">
        <div class="left">
            <h1>Add Product</h1>
            <ul class="breadcrumb">
                <li>
                    <a class ="active"
                    href={{ route('inventoryIndex') }}>Inventory</a>
                </li>

                <li><i class='bx bx-chevron-right' ></i></li>

                <li>
                    <a class="active" href="#">Add</a>
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
        <h2>Product Information</h2>
        <form action="{{ route('inventoryStore') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="product-form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="feeds_product_name" required>
            </div>
            {{-- image upload with preview --}}
            {{-- <label for="productImage">Product Image: </label>

            <div class="product-form-group">
                <div class="image-preview">
                    <img src="" alt="" id="previewImage">
                    <input type="file" id="productImage" name="product_image" required onchange="showImage()" >
                </div>

            </div> --}}
            <input type="file" id="file-facility" name="product_image" accept="image/*" hidden >
            <div class="img-area-facility" data-img="">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Upload Facility Image</h3>
                <p>Image size must be less than <span>2MB</span></p>
            </div>
            <button class="select-image-facility">Select Image</button>
            <div class="product-form-group">
                <label for="productDescription">Product Description:</label>
                <textarea id="productDescription" name="product_description" required></textarea>
            </div>
            <div class="product-form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" min="0" step="0.01" required>
            </div>
            <div class="product-form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="0" required>
            </div>
            <div class="product-form-group">
                <button type="submit" class="announcement-btn">Submit</button>
            </div>
        </form>
    </div>

@endsection