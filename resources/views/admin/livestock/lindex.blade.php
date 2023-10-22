@extends('admin.livestock.livestock')
@section('livestock')

    <div class="head-title">
        <div class="left">
            <h1>Livestock</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Livestock</a>
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
                <h3>1020</h3>
                <p>Total Livestock</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>720</h3>
                <p>Pigs</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
                <h3>300</h3>
                <p>Cows</p>
            </span>
        </li>
    </ul>

    <div class="head-title mt-2">
        <div class="left">
            <ul class="breadcrumb">
                <li>
                    <a class="active breadcrumbs-hover" href="#">Livestock</a>
                </li>
                <li>||</li>
                <li>
                    <a class="active breadcrumbs-hover" href="#">Livestock Type</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <table>
                <thead>
                    <tr>
                        <th>Control number</th>
                        <th>Released to</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>CP01</p>
                        </td>
                        <td>
                            <p>U1001</p>
                        </td>
                        <td>
                            Pig
                        </td>
                        <td><span class="status completed">Completed</span></td>
                        <td>7 months</td>
                        <td><span class="status process">View</span></td>
                        <td><span class="status completed">Edit</span></td>
                        <td><span class="status pending">Delete</span></td>

                    </tr>
                    <tr>
                        <td>
                            <p>CP02</p>
                        </td>
                        <td>
                            <p>U1101</p>
                        </td>
                        <td>
                            Pig
                        </td>
                        <td><span class="status pending">Pending</span></td>
                        <td>7 months</td>
                        <td><span class="status process">View</span></td>
                        <td><span class="status completed">Edit</span></td>
                        <td><span class="status pending">Delete</span></td>
                    </tr>
                    <tr>
                        <td>
                            <p>U1002</p>
                        </td>
                        <td>
                            <p>CP01</p>
                        </td>
                        <td>
                            Cow
                        </td>
                        <td><span class="status pending">Pending</span></td>
                        <td>7 months</td>
                        <td><span class="status process">View</span></td>
                        <td><span class="status completed">Edit</span></td>
                        <td><span class="status pending">Delete</span></td>
                    </tr>
                    <tr>
                        <td>
                            <p>CP04</p>
                        </td>
                        <td>
                            <p>U1021</p>
                        </td>
                        <td>
                            Cow
                        </td>
                        <td><span class="status pending">Pending</span></td>
                        <td>7 months</td>
                        <td><span class="status process">View</span></td>
                        <td><span class="status completed">Edit</span></td>
                        <td><span class="status pending">Delete</span></td>
                    </tr>
                    <tr>
                        <td>
                            <p>CP05</p>
                        </td>
                        <td>
                            <p>U1005</p>
                        </td>
                        <td>
                            Cow
                        </td>
                        <td><span class="status pending">Pending</span></td>
                        <td>7 months</td>
                        <td><span class="status process">View</span></td>
                        <td><span class="status completed">Edit</span></td>
                        <td><span class="status pending">Delete</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection