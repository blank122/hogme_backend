@extends('admin.livestock.livestock')
@section('livestock')

    <div class="head-title">
        <div class="left">
            <h1>Livestock</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Livestock Type</a>
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
            <i class='bx bxs-group' ></i>
            <span class="text">
                <p>Chicken</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <p>Ducks</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <p>Pigs</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
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
                        <th>Livestock Type</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Pig</p>
                        </td>
                        <td>
                            <p>150</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Cow</p>
                        </td>
                        <td>
                            <p>120</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Chicken</p>
                        </td>
                        <td>
                            <p>100</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Ducks</p>
                        </td>
                        <td>
                            <p>100</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection