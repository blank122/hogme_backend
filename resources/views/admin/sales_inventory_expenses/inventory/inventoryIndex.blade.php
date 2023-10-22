@extends('admin.sales_inventory_expenses.inventory.inventory')
@section('inventory')
@if (Session::has('success'))
        <script>
            swal("Message", "{{ Session::get('success') }}", 'success',{
                button:true,
                button:"OK",
                timer:3000,
                dangerMode:true,
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            swal("Message", "{{ Session::get('error') }}", 'error',{
                button:true,
                button:"OK",
                timer:3000,
                dangerMode:true,
            });
        </script>
    @endif
    <div class="head-title">
        <div class="left">
            <h1>Inventory</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Inventory</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="{{ route('inventoryCreate') }}" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text">Add Item</span>
        </a>
    </div>

    <ul class="box-info">

    </ul>

    <div class="hero">
        <div class="btn-box">
            <a class="btn-tab active-tab">
                <span class="material-icons-sharp">
                    savings
                </span>
                Inventory
            </a>
            <a class="btn-tab" >
                <span class="material-icons-sharp">
                    price_check
                </span>
                    Sales
            </a>
            <a class="btn-tab" href="{{ route('expensesIndex') }}">
                <span class="material-icons-sharp">
                    production_quantity_limits
                </span>
                Expenses</a>
        </div>
    </div>

    <div class="table-data">

        <div class="order">
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Feeds Description</th>
                        <th>Price</th>
                        <th>Quantity (per sacks)</th>
                        <th>Status</th>
                        <th>Product Image</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($product as $products)

                        <tr>
                            <td>
                                <p>{{ $products->id }}</p>
                            </td>
                            <td>
                                <p>{{ $products->feeds_product_name }}</p>
                            </td>
                            <td>
                                <p>{{ Str::limit($products->product_description, 20, '...') }}</p>
                            </td>
                            <td>
                                <p>{{ $products->price }}</p>
                            </td>
                            <td>
                                {{ $products->quantity }}
                            </td>
                            <td>


                                @if ($products->quantity == 0)
                                <span class="status pending">Not Available</span>

                                @elseif ($products->quantity <= 5)
                                <span class="status pending">Need to restock</span>

                                @else
                                <span class="status completed">Available</span>

                                @endif
                            </td>
                            <td>
                                <img src="/productImages/{{ $products->product_image }}" class="fetchimage">
                            </td>
                            <td>
                                <a href="{{ route('inventoryEdit',  ['product'=>$products]) }}"><span class="status completed">Update</span></a>
                            </td>
                                <td>
                                    <form action="" method="post" class="dropdown-item py-2 logout">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn status pending" type="submit">
                                            <span class="">Delete</span>
                                        </button>
                                    </form>
                                </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $product->links() }}
            </div>
        </div>
    </div>

@endsection