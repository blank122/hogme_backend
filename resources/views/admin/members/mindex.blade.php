@extends('admin.members.members')
@section('members')
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
            <h1>Members</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Members Application</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text"></span>
        </a>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>{{ $totalUser }}</h3>
                <p>Total User</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>{{ $pending }}</h3>
                <p>Pending Application</p>
            </span>
        </li>
    </ul>

    <div class="hero">
        <div class="btn-box">
            <a class="btn-tab active-tab">
                <span class="material-icons-sharp">
                    how_to_reg
                </span>
                Membership application
            </a>
            <a class="btn-tab" >
                <span class="material-icons-sharp">
                    archive
                </span>
                    Archive
            </a>
            <a class="btn-tab" href="{{ route('expensesIndex') }}">
                <span class="material-icons-sharp">
                    production_quantity_limits
                </span>
                Approved Applicants
            </a>
        </div>
    </div>



    <div class="modal fade" id="facilityPicture"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- Add image inside the body of modal -->
                {{-- <div class="modal-body">
                    @foreach ($facilityImage as $facilityImages )

                    <img src="/postImages/{{ $facilityImages->facility_picture }}" class="fetchimage"
                        alt="Facility Picture" />
                    @endforeach

                </div> --}}

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Facility Picture</th>
                        <th>Valid ID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                    {{-- Show modal for picture --}}


                    <tr>
                        <td>
                            <p>{{ $users->id }}</p>
                        </td>
                        <td>
                            <p>{{ $users->first_name }}</p>
                        </td>
                        <td>
                            <p>{{ $users->last_name }}</p>
                        </td>
                        <td>
                            <p>{{ $users->contact_number }}</p>
                        </td>

                        <td>
                            <img src="/postImages/{{ $users->facility_picture }}" class="fetchimage">

                        </td>

                        <td>
                            <img src="/postImages/{{ $users->valid_id }}" class="fetchimage">
                        </td>

                        <td>{{ $users->status=="Default" ? "Pending" : "Approve" }}</td>

                        <td>

                            <form action="{{ route('applicationApprove', $users->id) }}" method="post" class="dropdown-item py-2 logout">

                                @csrf
                                @method('POST')
                                <button class="btn btn-success d-flex" type="submit">
                                    <span class="text status ">Approve</span>
                                </button>

                            </form>
                        </td>
                        <td>
                            <form action="{{ route('rejectApplication', $users->id) }}" method="post" class="dropdown-item py-2 logout">

                                @csrf
                                @method('POST')
                                <button class="btn btn-danger d-flex" type="submit">
                                    <span class="text status ">Reject</span>
                                </button>

                            </form>
                        </td>

                        {{-- <td><a href="{{ route('rejectApplication', ['user'=>$users]) }}"><span class="status pending">Reject</span></a></td> --}}
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $user->links() }}
            </div>
        </div>
    </div>

@endsection