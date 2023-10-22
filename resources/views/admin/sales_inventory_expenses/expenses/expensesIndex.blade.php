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
            <h1>Expenses</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Expenses</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="{{ route('expensesCreate') }}" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text">Add Item</span>
        </a>
    </div>

    <ul class="box-info">

    </ul>

    <div class="hero">
        <div class="btn-box">
            <a class="btn-tab" href="{{ route('inventoryIndex') }}">
                <span class="material-icons-sharp">
                    savings
                </span>
                Inventory
            </a>
            <a class="btn-tab">
                <span class="material-icons-sharp">
                    price_check
                </span>
                    Sales
            </a>
            <a class="btn-tab active-tab">
                <span class="material-icons-sharp">
                    production_quantity_limits
                </span>
                Expenses
            </a>
        </div>
    </div>

    <div class="table-data">

        <div class="order">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Materials</th>
                        <th>Weight  (kg)</th>
                        <th>Price (per kg)</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($expense as $expenses)

                        <tr>
                            <td>
                                <p>{{ $expenses->created_at->format('Y-m-d') }}</p>
                            </td>
                            <td>
                                <p>{{ $expenses->materials }}</p>
                            </td>
                            <td>
                                <p>{{ $expenses->weight }} kg</p>
                            </td>
                            <td>
                                <p>₱ {{ $expenses->price }}</p>
                            </td>
                            <td>
                                ₱ {{ $expenses->amount }}
                            </td>

                            <td>
                                {{-- <a href="{{ route('inventoryEdit',  ['expense'=>$expenses]) }}"><span class="status completed">Update</span></a> --}}
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

                    {{-- <tr>
                        <td>
                            <p>10/01/2023</p>
                        </td>
                        <td>
                            <p>Corn</p>
                        </td>
                        <td>
                            50
                        </td>
                        <td>
                            28.00
                        </td>
                        <td>1400</td>
                        <td><span class="status completed">Edit</span></td>
                        <td><span class="status pending">Delete</span></td>

                    </tr> --}}

                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $expense->links() }}
            </div>
        </div>
    </div>

@endsection