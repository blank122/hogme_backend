<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
	<link rel="stylesheet" href= {{ asset('adminnew/adminhub-master/style.css') }} >

	<title>@yield('title')</title>
</head>
<body>

	<div class="product-container">
        <h2>Registration Form</h2>
        <form action="{{ route('farmerStore') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="product-form-group">
                <label for="productName">First Name:</label>
                <input type="text" id="productName" name="first_name" required>
            </div>
			<div class="product-form-group">
                <label for="productName">Last Name:</label>
                <input type="text" id="productName" name="last_name" required>
            </div>
			<div class="product-form-group">
                <label for="productName">Contact number:</label>
                <input type="number" id="productName" name="contact_number" required>
            </div>
            {{-- image upload with preview --}}
            {{-- <label for="productImage">Product Image: </label>

            <div class="product-form-group">
                <div class="image-preview">
                    <img src="" alt="" id="previewImage">
                    <input type="file" id="productImage" name="product_image" required onchange="showImage()" >
                </div>

            </div> --}}
            <input type="file" id="file-facility" name="facility_picture" accept="image/*" hidden >
            <div class="img-area-facility" data-img="">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Upload Facility Image</h3>
                <p>Image size must be less than <span>2MB</span></p>
            </div>
            <button class="select-image-facility">Select Image</button>

			<input type="file" id="file-valid-id" name="valid_id" accept="image/*" hidden >
            <div class="img-area-valid-id" data-img="">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Upload Valid ID</h3>
                <p>Image size must be less than <span>2MB</span></p>
            </div>

            <button class="select-image-valid-id">Select Image</button>

            <div class="product-form-group">
                <label for="productName">Email Address:</label>
                <input type="text" id="productName" name="email" required>
            </div>
            <div class="product-form-group">
                <label for="productName">Password:</label>
                <input type="password" id="productName" name="password" required>
            </div>

            <div class="product-form-group">
                <button type="submit" class="announcement-btn">Submit</button>
            </div>
        </form>
    </div>



    <script src={{ asset('adminnew/adminhub-master/script.js') }}></script>

	<script src={{ asset('adminnew/adminhub-master/preview_image.js') }}></script>

    <script src="https://kit.fontawesome.com/bb8081d169.js" crossorigin="anonymous"></script>
</body>
</html>